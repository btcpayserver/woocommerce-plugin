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
 * FBAOutboundServiceMWS_Model_GetFulfillmentOrderRequest
 * 
 * Properties:
 * <ul>
 * 
 * <li>SellerId: string</li>
 * <li>Marketplace: string</li>
 * <li>SellerFulfillmentOrderId: string</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_GetFulfillmentOrderRequest extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_GetFulfillmentOrderRequest
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>SellerId: string</li>
     * <li>Marketplace: string</li>
     * <li>SellerFulfillmentOrderId: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'SellerId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Marketplace' => array('FieldValue' => null, 'FieldType' => 'string'),
        'SellerFulfillmentOrderId' => array('FieldValue' => null, 'FieldType' => 'string'),
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
     * @return FBAOutboundServiceMWS_Model_GetFulfillmentOrderRequest instance
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
     * @return FBAOutboundServiceMWS_Model_GetFulfillmentOrderRequest instance
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
     * @return FBAOutboundServiceMWS_Model_GetFulfillmentOrderRequest instance
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




}