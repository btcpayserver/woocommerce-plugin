<?php

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
{
	
	function bitpay_callback()
	{				
		if(isset($_GET['bitpay_callback']))
		{
			//bplog(file_get_contents("php://input"));
			
			global $woocommerce;
			
			require(plugin_dir_path(__FILE__).'bp_lib.php');
			
			$gateways = $woocommerce->payment_gateways->payment_gateways();
			if (!isset($gateways['bitpay']))
			{
				bplog('bitpay plugin not enabled in woocommerce');
				return;
			}
			$bp = $gateways['bitpay'];
			$response = bpVerifyNotification( $bp->settings['apiKey'] );

			if (isset($response['error']))
				bplog($response);
			else
			{
				$orderId = $response['posData'];
				$order = new WC_Order( $orderId );

				switch($response['status'])
				{
					case 'paid':
						break;
					case 'confirmed':
					case 'complete':
						unset($_SESSION['order_awaiting_payment']);
						
						$order->payment_complete();		

						if ($response['status'] == 'complete')
							processOrderFBA($bp, $order);
						
						break;
				}
			}
		}
	}
	
	function processOrderFBA($bitpay, $order)
	{
		if (!$bitpay->settings['fbaEnabled'])
			return;

		require_once (plugin_dir_path(__FILE__).'FBAOutboundServiceMWS/config.inc.php');
		
		// gather order info
		$items = $order->get_items();
		
		$orderItems = array();
		foreach ($items as $i)
		{
			$product = new WC_Product($i['id']);			
			if (!strlen($product->get_sku()))
			{
				bplog('No product SKU. FBA order not sent');
				return false;
			}
			$orderItems[] = array(
				'currency' => get_woocommerce_currency(),
				'value' => $i['line_subtotal'],
				'sku' => $product->get_sku(),
				'quantity' => $i['qty']);
		}
				
		$prefix = ($order->shipping_address_1) ? 'shipping_' : 'billing_';
		$address = array(
			'name' => $order->{$prefix.first_name}.' '.$order->{$prefix.last_name},
			'line1' => $order->{$prefix.address_1},
			'line2' => $order->{$prefix.address_2},
			'line3' => '',
			'city' => $order->{$prefix.city},
			'state' => $order->{$prefix.state},
			'country' => $order->{$prefix.country},
			'zip' => $order->{$prefix.postcode},
			'phone' => $order->billing_phone); // there is no shipping_phone
		if (strlen($order->{$prefix.company}))
			$address['name'] = $order->{$prefix.company}.' c/o '.$address['name'];
		
		$orderId = $order->id;
		$shippingSpeed = $bitpay->settings['fbaShippingSpeed'];
		$fulfillmentPolicy = $bitpay->settings['fbaFulfillmentPolicy'];
		

		define('ACCESS_KEY_ID', $bitpay->settings['fbaAccessKeyId']);
		define('SECRET_ACCESS_KEY', $bitpay->settings['fbaSecretAccessKey']);  
		define('SELLER_ID', $bitpay->settings['fbaSellerId']);
		define('MARKETPLACE_ID', $bitpay->settings['fbaMarketplaceId']);
		define('MWS_ENDPOINT_URL', $bitpay->settings['fbaEndpointUrl']);

		// create required FBA objects

		$config = array (
			'ServiceURL' => MWS_ENDPOINT_URL,
			'ProxyHost' => null,
			'ProxyPort' => -1,
			'MaxErrorRetry' => 3
			);

		$service = new FBAOutboundServiceMWS_Client(
			ACCESS_KEY_ID, 
			SECRET_ACCESS_KEY, 
			$config,
			APPLICATION_NAME,
			APPLICATION_VERSION);
		
		$items = array();
		foreach($orderItems as $i)
		{
			$value = new FBAOutboundServiceMWS_Model_Currency();
			$value->setCurrencyCode($i['currency']);
			$value->setValue($i['price']);
			 
			$item = new FBAOutboundServiceMWS_Model_FulfillmentOrderItem();
			$item->setSellerSKU($i['sku']); // must be amazon's SKU
			$item->setSellerFulfillmentOrderItemId(count($orderItems)+1); // seller can choose this
			$item->setQuantity( (int)$i['quantity'] ); // must be integer or FBA server fails
			//$item->setPerUnitDeclaredValue($value); // not required -- this isn't the right format anyway
			$items[] = $item;
		}

		$list = new FBAOutboundServiceMWS_Model_FulfillmentOrderItemList();
		$list->setMember($items);

		$emails = new FBAOutboundServiceMWS_Model_NotificationEmailList();
		
		
		$fbaAddress = new FBAOutboundServiceMWS_Model_Address();
		$fbaAddress->setName($address['name']);
		$fbaAddress->setLine1($address['line1']);
		$fbaAddress->setLine2($address['line2']);
		$fbaAddress->setLine3($address['line3']);
		$fbaAddress->setCity($address['city']);
		$fbaAddress->setStateOrProvinceCode($address['state']);
		$fbaAddress->setCountryCode($address['country']);
		$fbaAddress->setPostalCode($address['zip']);
		$fbaAddress->setPhoneNumber($address['phone']);
		

		$request = new FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest();
		$request->setSellerId(SELLER_ID);
		$request->setMarketplace(MARKETPLACE_ID);
		$request->setSellerFulfillmentOrderId($orderId);
		$request->setDisplayableOrderId($orderId);
		$request->setDisplayableOrderDateTime(date('Y-m-d', time()));
		$request->setDisplayableOrderComment("Thank you for your order.");
		$request->setShippingSpeedCategory($shippingSpeed);
		$request->setDestinationAddress($fbaAddress);
		$request->setFulfillmentPolicy($fulfillmentPolicy);
		$request->setFulfillmentMethod('Consumer');
		$request->setNotificationEmailList($emails);
		$request->setItems($list);

		// send request to amazon
		try {
			$response = $service->createFulfillmentOrder($request);

			bplog ("Service Response");
			bplog ("=============================================================================");

			bplog("        CreateFulfillmentOrderResponse");
			if ($response->isSetResponseMetadata()) { 
				bplog("            ResponseMetadata");
				$responseMetadata = $response->getResponseMetadata();
				if ($responseMetadata->isSetRequestId()) 
				{
					bplog("                RequestId");
					bplog("                    " . $responseMetadata->getRequestId());
				}
			} 

		} catch (FBAOutboundServiceMWS_Exception $ex) {
			bplog("Caught Exception: " . $ex->getMessage());
			bplog('order '.$order->id);
			bplog("Response Status Code: " . $ex->getStatusCode());
			bplog("Error Code: " . $ex->getErrorCode());
			bplog("Error Type: " . $ex->getErrorType());
			bplog("Request ID: " . $ex->getRequestId());
			bplog("XML: " . $ex->getXML());
		}
	
	}
	

	add_action('init', 'bitpay_callback');
	
}