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
 * FBAOutboundServiceMWS_Model_UnfulfillablePreviewItem
 * 
 * Properties:
 * <ul>
 * 
 * <li>SellerSKU: string</li>
 * <li>Quantity: int</li>
 * <li>SellerFulfillmentOrderItemId: string</li>
 * <li>ItemUnfulfillableReasons: FBAOutboundServiceMWS_Model_StringList</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_UnfulfillablePreviewItem extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_UnfulfillablePreviewItem
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>SellerSKU: string</li>
     * <li>Quantity: int</li>
     * <li>SellerFulfillmentOrderItemId: string</li>
     * <li>ItemUnfulfillableReasons: FBAOutboundServiceMWS_Model_StringList</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'SellerSKU' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Quantity' => array('FieldValue' => null, 'FieldType' => 'int'),
        'SellerFulfillmentOrderItemId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'ItemUnfulfillableReasons' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_StringList'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the SellerSKU property.
     * 
     * @return string SellerSKU
     */
    public function getSellerSKU() 
    {
        return $this->_fields['SellerSKU']['FieldValue'];
    }

    /**
     * Sets the value of the SellerSKU property.
     * 
     * @param string SellerSKU
     * @return this instance
     */
    public function setSellerSKU($value) 
    {
        $this->_fields['SellerSKU']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the SellerSKU and returns this instance
     * 
     * @param string $value SellerSKU
     * @return FBAOutboundServiceMWS_Model_UnfulfillablePreviewItem instance
     */
    public function withSellerSKU($value)
    {
        $this->setSellerSKU($value);
        return $this;
    }


    /**
     * Checks if SellerSKU is set
     * 
     * @return bool true if SellerSKU  is set
     */
    public function isSetSellerSKU()
    {
        return !is_null($this->_fields['SellerSKU']['FieldValue']);
    }

    /**
     * Gets the value of the Quantity property.
     * 
     * @return int Quantity
     */
    public function getQuantity() 
    {
        return $this->_fields['Quantity']['FieldValue'];
    }

    /**
     * Sets the value of the Quantity property.
     * 
     * @param int Quantity
     * @return this instance
     */
    public function setQuantity($value) 
    {
        $this->_fields['Quantity']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Quantity and returns this instance
     * 
     * @param int $value Quantity
     * @return FBAOutboundServiceMWS_Model_UnfulfillablePreviewItem instance
     */
    public function withQuantity($value)
    {
        $this->setQuantity($value);
        return $this;
    }


    /**
     * Checks if Quantity is set
     * 
     * @return bool true if Quantity  is set
     */
    public function isSetQuantity()
    {
        return !is_null($this->_fields['Quantity']['FieldValue']);
    }

    /**
     * Gets the value of the SellerFulfillmentOrderItemId property.
     * 
     * @return string SellerFulfillmentOrderItemId
     */
    public function getSellerFulfillmentOrderItemId() 
    {
        return $this->_fields['SellerFulfillmentOrderItemId']['FieldValue'];
    }

    /**
     * Sets the value of the SellerFulfillmentOrderItemId property.
     * 
     * @param string SellerFulfillmentOrderItemId
     * @return this instance
     */
    public function setSellerFulfillmentOrderItemId($value) 
    {
        $this->_fields['SellerFulfillmentOrderItemId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the SellerFulfillmentOrderItemId and returns this instance
     * 
     * @param string $value SellerFulfillmentOrderItemId
     * @return FBAOutboundServiceMWS_Model_UnfulfillablePreviewItem instance
     */
    public function withSellerFulfillmentOrderItemId($value)
    {
        $this->setSellerFulfillmentOrderItemId($value);
        return $this;
    }


    /**
     * Checks if SellerFulfillmentOrderItemId is set
     * 
     * @return bool true if SellerFulfillmentOrderItemId  is set
     */
    public function isSetSellerFulfillmentOrderItemId()
    {
        return !is_null($this->_fields['SellerFulfillmentOrderItemId']['FieldValue']);
    }

    /**
     * Gets the value of the ItemUnfulfillableReasons.
     * 
     * @return StringList ItemUnfulfillableReasons
     */
    public function getItemUnfulfillableReasons() 
    {
        return $this->_fields['ItemUnfulfillableReasons']['FieldValue'];
    }

    /**
     * Sets the value of the ItemUnfulfillableReasons.
     * 
     * @param StringList ItemUnfulfillableReasons
     * @return void
     */
    public function setItemUnfulfillableReasons($value) 
    {
        $this->_fields['ItemUnfulfillableReasons']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the ItemUnfulfillableReasons  and returns this instance
     * 
     * @param StringList $value ItemUnfulfillableReasons
     * @return FBAOutboundServiceMWS_Model_UnfulfillablePreviewItem instance
     */
    public function withItemUnfulfillableReasons($value)
    {
        $this->setItemUnfulfillableReasons($value);
        return $this;
    }


    /**
     * Checks if ItemUnfulfillableReasons  is set
     * 
     * @return bool true if ItemUnfulfillableReasons property is set
     */
    public function isSetItemUnfulfillableReasons()
    {
        return !is_null($this->_fields['ItemUnfulfillableReasons']['FieldValue']);

    }




}