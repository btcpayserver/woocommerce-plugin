<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     FBAOutboundServiceMWS
 *  @copyright   Copyright 2009 Amazon.com, Inc. All Rights Reserved.
 *  @link        http://mws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2010-10-01
 */
/******************************************************************************* 
 * 
 *  FBA Outbound Service MWS PHP5 Library
 *  Generated: Fri Oct 22 09:51:48 UTC 2010
 * 
 */

/**
 *  @see FBAOutboundServiceMWS_Model
 */
require_once ('FBAOutboundServiceMWS/Model.php');  

    

/**
 * FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest
 * 
 * Properties:
 * <ul>
 * 
 * <li>SellerId: string</li>
 * <li>Marketplace: string</li>
 * <li>SellerFulfillmentOrderId: string</li>
 * <li>DisplayableOrderId: string</li>
 * <li>DisplayableOrderDateTime: string</li>
 * <li>DisplayableOrderComment: string</li>
 * <li>ShippingSpeedCategory: string</li>
 * <li>DestinationAddress: FBAOutboundServiceMWS_Model_Address</li>
 * <li>FulfillmentPolicy: string</li>
 * <li>FulfillmentMethod: string</li>
 * <li>NotificationEmailList: FBAOutboundServiceMWS_Model_NotificationEmailList</li>
 * <li>Items: FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItemList</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>SellerId: string</li>
     * <li>Marketplace: string</li>
     * <li>SellerFulfillmentOrderId: string</li>
     * <li>DisplayableOrderId: string</li>
     * <li>DisplayableOrderDateTime: string</li>
     * <li>DisplayableOrderComment: string</li>
     * <li>ShippingSpeedCategory: string</li>
     * <li>DestinationAddress: FBAOutboundServiceMWS_Model_Address</li>
     * <li>FulfillmentPolicy: string</li>
     * <li>FulfillmentMethod: string</li>
     * <li>NotificationEmailList: FBAOutboundServiceMWS_Model_NotificationEmailList</li>
     * <li>Items: FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItemList</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'SellerId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Marketplace' => array('FieldValue' => null, 'FieldType' => 'string'),
        'SellerFulfillmentOrderId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'DisplayableOrderId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'DisplayableOrderDateTime' => array('FieldValue' => null, 'FieldType' => 'string'),
        'DisplayableOrderComment' => array('FieldValue' => null, 'FieldType' => 'string'),
        'ShippingSpeedCategory' => array('FieldValue' => null, 'FieldType' => 'string'),
        'DestinationAddress' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_Address'),
        'FulfillmentPolicy' => array('FieldValue' => null, 'FieldType' => 'string'),
        'FulfillmentMethod' => array('FieldValue' => null, 'FieldType' => 'string'),
        'NotificationEmailList' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_NotificationEmailList'),
        'Items' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItemList'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the SellerId property.
     * 
     * @return string SellerId
     */
    public function getSellerId() 
    {
        return $this->_fields['SellerId']['FieldValue'];
    }

    /**
     * Sets the value of the SellerId property.
     * 
     * @param string SellerId
     * @return this instance
     */
    public function setSellerId($value) 
    {
        $this->_fields['SellerId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the SellerId and returns this instance
     * 
     * @param string $value SellerId
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest instance
     */
    public function withSellerId($value)
    {
        $this->setSellerId($value);
        return $this;
    }


    /**
     * Checks if SellerId is set
     * 
     * @return bool true if SellerId  is set
     */
    public function isSetSellerId()
    {
        return !is_null($this->_fields['SellerId']['FieldValue']);
    }

    /**
     * Gets the value of the Marketplace property.
     * 
     * @return string Marketplace
     */
    public function getMarketplace() 
    {
        return $this->_fields['Marketplace']['FieldValue'];
    }

    /**
     * Sets the value of the Marketplace property.
     * 
     * @param string Marketplace
     * @return this instance
     */
    public function setMarketplace($value) 
    {
        $this->_fields['Marketplace']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Marketplace and returns this instance
     * 
     * @param string $value Marketplace
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest instance
     */
    public function withMarketplace($value)
    {
        $this->setMarketplace($value);
        return $this;
    }


    /**
     * Checks if Marketplace is set
     * 
     * @return bool true if Marketplace  is set
     */
    public function isSetMarketplace()
    {
        return !is_null($this->_fields['Marketplace']['FieldValue']);
    }

    /**
     * Gets the value of the SellerFulfillmentOrderId property.
     * 
     * @return string SellerFulfillmentOrderId
     */
    public function getSellerFulfillmentOrderId() 
    {
        return $this->_fields['SellerFulfillmentOrderId']['FieldValue'];
    }

    /**
     * Sets the value of the SellerFulfillmentOrderId property.
     * 
     * @param string SellerFulfillmentOrderId
     * @return this instance
     */
    public function setSellerFulfillmentOrderId($value) 
    {
        $this->_fields['SellerFulfillmentOrderId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the SellerFulfillmentOrderId and returns this instance
     * 
     * @param string $value SellerFulfillmentOrderId
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest instance
     */
    public function withSellerFulfillmentOrderId($value)
    {
        $this->setSellerFulfillmentOrderId($value);
        return $this;
    }


    /**
     * Checks if SellerFulfillmentOrderId is set
     * 
     * @return bool true if SellerFulfillmentOrderId  is set
     */
    public function isSetSellerFulfillmentOrderId()
    {
        return !is_null($this->_fields['SellerFulfillmentOrderId']['FieldValue']);
    }

    /**
     * Gets the value of the DisplayableOrderId property.
     * 
     * @return string DisplayableOrderId
     */
    public function getDisplayableOrderId() 
    {
        return $this->_fields['DisplayableOrderId']['FieldValue'];
    }

    /**
     * Sets the value of the DisplayableOrderId property.
     * 
     * @param string DisplayableOrderId
     * @return this instance
     */
    public function setDisplayableOrderId($value) 
    {
        $this->_fields['DisplayableOrderId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the DisplayableOrderId and returns this instance
     * 
     * @param string $value DisplayableOrderId
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest instance
     */
    public function withDisplayableOrderId($value)
    {
        $this->setDisplayableOrderId($value);
        return $this;
    }


    /**
     * Checks if DisplayableOrderId is set
     * 
     * @return bool true if DisplayableOrderId  is set
     */
    public function isSetDisplayableOrderId()
    {
        return !is_null($this->_fields['DisplayableOrderId']['FieldValue']);
    }

    /**
     * Gets the value of the DisplayableOrderDateTime property.
     * 
     * @return string DisplayableOrderDateTime
     */
    public function getDisplayableOrderDateTime() 
    {
        return $this->_fields['DisplayableOrderDateTime']['FieldValue'];
    }

    /**
     * Sets the value of the DisplayableOrderDateTime property.
     * 
     * @param string DisplayableOrderDateTime
     * @return this instance
     */
    public function setDisplayableOrderDateTime($value) 
    {
        $this->_fields['DisplayableOrderDateTime']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the DisplayableOrderDateTime and returns this instance
     * 
     * @param string $value DisplayableOrderDateTime
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest instance
     */
    public function withDisplayableOrderDateTime($value)
    {
        $this->setDisplayableOrderDateTime($value);
        return $this;
    }


    /**
     * Checks if DisplayableOrderDateTime is set
     * 
     * @return bool true if DisplayableOrderDateTime  is set
     */
    public function isSetDisplayableOrderDateTime()
    {
        return !is_null($this->_fields['DisplayableOrderDateTime']['FieldValue']);
    }

    /**
     * Gets the value of the DisplayableOrderComment property.
     * 
     * @return string DisplayableOrderComment
     */
    public function getDisplayableOrderComment() 
    {
        return $this->_fields['DisplayableOrderComment']['FieldValue'];
    }

    /**
     * Sets the value of the DisplayableOrderComment property.
     * 
     * @param string DisplayableOrderComment
     * @return this instance
     */
    public function setDisplayableOrderComment($value) 
    {
        $this->_fields['DisplayableOrderComment']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the DisplayableOrderComment and returns this instance
     * 
     * @param string $value DisplayableOrderComment
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest instance
     */
    public function withDisplayableOrderComment($value)
    {
        $this->setDisplayableOrderComment($value);
        return $this;
    }


    /**
     * Checks if DisplayableOrderComment is set
     * 
     * @return bool true if DisplayableOrderComment  is set
     */
    public function isSetDisplayableOrderComment()
    {
        return !is_null($this->_fields['DisplayableOrderComment']['FieldValue']);
    }

    /**
     * Gets the value of the ShippingSpeedCategory property.
     * 
     * @return string ShippingSpeedCategory
     */
    public function getShippingSpeedCategory() 
    {
        return $this->_fields['ShippingSpeedCategory']['FieldValue'];
    }

    /**
     * Sets the value of the ShippingSpeedCategory property.
     * 
     * @param string ShippingSpeedCategory
     * @return this instance
     */
    public function setShippingSpeedCategory($value) 
    {
        $this->_fields['ShippingSpeedCategory']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the ShippingSpeedCategory and returns this instance
     * 
     * @param string $value ShippingSpeedCategory
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest instance
     */
    public function withShippingSpeedCategory($value)
    {
        $this->setShippingSpeedCategory($value);
        return $this;
    }


    /**
     * Checks if ShippingSpeedCategory is set
     * 
     * @return bool true if ShippingSpeedCategory  is set
     */
    public function isSetShippingSpeedCategory()
    {
        return !is_null($this->_fields['ShippingSpeedCategory']['FieldValue']);
    }

    /**
     * Gets the value of the DestinationAddress.
     * 
     * @return Address DestinationAddress
     */
    public function getDestinationAddress() 
    {
        return $this->_fields['DestinationAddress']['FieldValue'];
    }

    /**
     * Sets the value of the DestinationAddress.
     * 
     * @param Address DestinationAddress
     * @return void
     */
    public function setDestinationAddress($value) 
    {
        $this->_fields['DestinationAddress']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the DestinationAddress  and returns this instance
     * 
     * @param Address $value DestinationAddress
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest instance
     */
    public function withDestinationAddress($value)
    {
        $this->setDestinationAddress($value);
        return $this;
    }


    /**
     * Checks if DestinationAddress  is set
     * 
     * @return bool true if DestinationAddress property is set
     */
    public function isSetDestinationAddress()
    {
        return !is_null($this->_fields['DestinationAddress']['FieldValue']);

    }

    /**
     * Gets the value of the FulfillmentPolicy property.
     * 
     * @return string FulfillmentPolicy
     */
    public function getFulfillmentPolicy() 
    {
        return $this->_fields['FulfillmentPolicy']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentPolicy property.
     * 
     * @param string FulfillmentPolicy
     * @return this instance
     */
    public function setFulfillmentPolicy($value) 
    {
        $this->_fields['FulfillmentPolicy']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the FulfillmentPolicy and returns this instance
     * 
     * @param string $value FulfillmentPolicy
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest instance
     */
    public function withFulfillmentPolicy($value)
    {
        $this->setFulfillmentPolicy($value);
        return $this;
    }


    /**
     * Checks if FulfillmentPolicy is set
     * 
     * @return bool true if FulfillmentPolicy  is set
     */
    public function isSetFulfillmentPolicy()
    {
        return !is_null($this->_fields['FulfillmentPolicy']['FieldValue']);
    }

    /**
     * Gets the value of the FulfillmentMethod property.
     * 
     * @return string FulfillmentMethod
     */
    public function getFulfillmentMethod() 
    {
        return $this->_fields['FulfillmentMethod']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentMethod property.
     * 
     * @param string FulfillmentMethod
     * @return this instance
     */
    public function setFulfillmentMethod($value) 
    {
        $this->_fields['FulfillmentMethod']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the FulfillmentMethod and returns this instance
     * 
     * @param string $value FulfillmentMethod
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest instance
     */
    public function withFulfillmentMethod($value)
    {
        $this->setFulfillmentMethod($value);
        return $this;
    }


    /**
     * Checks if FulfillmentMethod is set
     * 
     * @return bool true if FulfillmentMethod  is set
     */
    public function isSetFulfillmentMethod()
    {
        return !is_null($this->_fields['FulfillmentMethod']['FieldValue']);
    }

    /**
     * Gets the value of the NotificationEmailList.
     * 
     * @return NotificationEmailList NotificationEmailList
     */
    public function getNotificationEmailList() 
    {
        return $this->_fields['NotificationEmailList']['FieldValue'];
    }

    /**
     * Sets the value of the NotificationEmailList.
     * 
     * @param NotificationEmailList NotificationEmailList
     * @return void
     */
    public function setNotificationEmailList($value) 
    {
        $this->_fields['NotificationEmailList']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the NotificationEmailList  and returns this instance
     * 
     * @param NotificationEmailList $value NotificationEmailList
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest instance
     */
    public function withNotificationEmailList($value)
    {
        $this->setNotificationEmailList($value);
        return $this;
    }


    /**
     * Checks if NotificationEmailList  is set
     * 
     * @return bool true if NotificationEmailList property is set
     */
    public function isSetNotificationEmailList()
    {
        return !is_null($this->_fields['NotificationEmailList']['FieldValue']);

    }

    /**
     * Gets the value of the Items.
     * 
     * @return CreateFulfillmentOrderItemList Items
     */
    public function getItems() 
    {
        return $this->_fields['Items']['FieldValue'];
    }

    /**
     * Sets the value of the Items.
     * 
     * @param CreateFulfillmentOrderItemList Items
     * @return void
     */
    public function setItems($value) 
    {
        $this->_fields['Items']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the Items  and returns this instance
     * 
     * @param CreateFulfillmentOrderItemList $value Items
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest instance
     */
    public function withItems($value)
    {
        $this->setItems($value);
        return $this;
    }


    /**
     * Checks if Items  is set
     * 
     * @return bool true if Items property is set
     */
    public function isSetItems()
    {
        return !is_null($this->_fields['Items']['FieldValue']);

    }




}