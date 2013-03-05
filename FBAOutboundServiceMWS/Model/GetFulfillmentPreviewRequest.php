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
 * FBAOutboundServiceMWS_Model_GetFulfillmentPreviewRequest
 * 
 * Properties:
 * <ul>
 * 
 * <li>SellerId: string</li>
 * <li>Marketplace: string</li>
 * <li>Address: FBAOutboundServiceMWS_Model_Address</li>
 * <li>Items: FBAOutboundServiceMWS_Model_GetFulfillmentPreviewItemList</li>
 * <li>ShippingSpeedCategories: FBAOutboundServiceMWS_Model_ShippingSpeedCategoryList</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_GetFulfillmentPreviewRequest extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_GetFulfillmentPreviewRequest
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>SellerId: string</li>
     * <li>Marketplace: string</li>
     * <li>Address: FBAOutboundServiceMWS_Model_Address</li>
     * <li>Items: FBAOutboundServiceMWS_Model_GetFulfillmentPreviewItemList</li>
     * <li>ShippingSpeedCategories: FBAOutboundServiceMWS_Model_ShippingSpeedCategoryList</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'SellerId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Marketplace' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Address' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_Address'),
        'Items' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_GetFulfillmentPreviewItemList'),
        'ShippingSpeedCategories' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_ShippingSpeedCategoryList'),
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
     * @return FBAOutboundServiceMWS_Model_GetFulfillmentPreviewRequest instance
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
     * @return FBAOutboundServiceMWS_Model_GetFulfillmentPreviewRequest instance
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
     * Gets the value of the Address.
     * 
     * @return Address Address
     */
    public function getAddress() 
    {
        return $this->_fields['Address']['FieldValue'];
    }

    /**
     * Sets the value of the Address.
     * 
     * @param Address Address
     * @return void
     */
    public function setAddress($value) 
    {
        $this->_fields['Address']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the Address  and returns this instance
     * 
     * @param Address $value Address
     * @return FBAOutboundServiceMWS_Model_GetFulfillmentPreviewRequest instance
     */
    public function withAddress($value)
    {
        $this->setAddress($value);
        return $this;
    }


    /**
     * Checks if Address  is set
     * 
     * @return bool true if Address property is set
     */
    public function isSetAddress()
    {
        return !is_null($this->_fields['Address']['FieldValue']);

    }

    /**
     * Gets the value of the Items.
     * 
     * @return GetFulfillmentPreviewItemList Items
     */
    public function getItems() 
    {
        return $this->_fields['Items']['FieldValue'];
    }

    /**
     * Sets the value of the Items.
     * 
     * @param GetFulfillmentPreviewItemList Items
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
     * @param GetFulfillmentPreviewItemList $value Items
     * @return FBAOutboundServiceMWS_Model_GetFulfillmentPreviewRequest instance
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

    /**
     * Gets the value of the ShippingSpeedCategories.
     * 
     * @return ShippingSpeedCategoryList ShippingSpeedCategories
     */
    public function getShippingSpeedCategories() 
    {
        return $this->_fields['ShippingSpeedCategories']['FieldValue'];
    }

    /**
     * Sets the value of the ShippingSpeedCategories.
     * 
     * @param ShippingSpeedCategoryList ShippingSpeedCategories
     * @return void
     */
    public function setShippingSpeedCategories($value) 
    {
        $this->_fields['ShippingSpeedCategories']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the ShippingSpeedCategories  and returns this instance
     * 
     * @param ShippingSpeedCategoryList $value ShippingSpeedCategories
     * @return FBAOutboundServiceMWS_Model_GetFulfillmentPreviewRequest instance
     */
    public function withShippingSpeedCategories($value)
    {
        $this->setShippingSpeedCategories($value);
        return $this;
    }


    /**
     * Checks if ShippingSpeedCategories  is set
     * 
     * @return bool true if ShippingSpeedCategories property is set
     */
    public function isSetShippingSpeedCategories()
    {
        return !is_null($this->_fields['ShippingSpeedCategories']['FieldValue']);

    }




}