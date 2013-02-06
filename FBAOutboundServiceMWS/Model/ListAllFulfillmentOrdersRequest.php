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
 * FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersRequest
 * 
 * Properties:
 * <ul>
 * 
 * <li>SellerId: string</li>
 * <li>Marketplace: string</li>
 * <li>QueryStartDateTime: string</li>
 * <li>FulfillmentMethod: FBAOutboundServiceMWS_Model_FulfillmentMethodList</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersRequest extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersRequest
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>SellerId: string</li>
     * <li>Marketplace: string</li>
     * <li>QueryStartDateTime: string</li>
     * <li>FulfillmentMethod: FBAOutboundServiceMWS_Model_FulfillmentMethodList</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'SellerId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Marketplace' => array('FieldValue' => null, 'FieldType' => 'string'),
        'QueryStartDateTime' => array('FieldValue' => null, 'FieldType' => 'string'),
        'FulfillmentMethod' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_FulfillmentMethodList'),
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
     * @return FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersRequest instance
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
     * @return FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersRequest instance
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
     * Gets the value of the QueryStartDateTime property.
     * 
     * @return string QueryStartDateTime
     */
    public function getQueryStartDateTime() 
    {
        return $this->_fields['QueryStartDateTime']['FieldValue'];
    }

    /**
     * Sets the value of the QueryStartDateTime property.
     * 
     * @param string QueryStartDateTime
     * @return this instance
     */
    public function setQueryStartDateTime($value) 
    {
        $this->_fields['QueryStartDateTime']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the QueryStartDateTime and returns this instance
     * 
     * @param string $value QueryStartDateTime
     * @return FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersRequest instance
     */
    public function withQueryStartDateTime($value)
    {
        $this->setQueryStartDateTime($value);
        return $this;
    }


    /**
     * Checks if QueryStartDateTime is set
     * 
     * @return bool true if QueryStartDateTime  is set
     */
    public function isSetQueryStartDateTime()
    {
        return !is_null($this->_fields['QueryStartDateTime']['FieldValue']);
    }

    /**
     * Gets the value of the FulfillmentMethod.
     * 
     * @return FulfillmentMethodList FulfillmentMethod
     */
    public function getFulfillmentMethod() 
    {
        return $this->_fields['FulfillmentMethod']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentMethod.
     * 
     * @param FulfillmentMethodList FulfillmentMethod
     * @return void
     */
    public function setFulfillmentMethod($value) 
    {
        $this->_fields['FulfillmentMethod']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the FulfillmentMethod  and returns this instance
     * 
     * @param FulfillmentMethodList $value FulfillmentMethod
     * @return FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersRequest instance
     */
    public function withFulfillmentMethod($value)
    {
        $this->setFulfillmentMethod($value);
        return $this;
    }


    /**
     * Checks if FulfillmentMethod  is set
     * 
     * @return bool true if FulfillmentMethod property is set
     */
    public function isSetFulfillmentMethod()
    {
        return !is_null($this->_fields['FulfillmentMethod']['FieldValue']);

    }




}