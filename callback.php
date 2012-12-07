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
						break;
				}
			}
		}
	}

	add_action('init', 'bitpay_callback');
	
}