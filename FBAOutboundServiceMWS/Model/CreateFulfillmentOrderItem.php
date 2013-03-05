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
 * FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItem
 * 
 * Properties:
 * <ul>
 * 
 * <li>SellerSKU: string</li>
 * <li>SellerFulfillmentOrderItemId: string</li>
 * <li>Quantity: int</li>
 * <li>GiftMessage: string</li>
 * <li>DisplayableComment: string</li>
 * <li>FulfillmentNetworkSKU: string</li>
 * <li>OrderItemDisposition: string</li>
 * <li>PerUnitDeclaredValue: FBAOutboundServiceMWS_Model_Currency</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItem extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItem
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>SellerSKU: string</li>
     * <li>SellerFulfillmentOrderItemId: string</li>
     * <li>Quantity: int</li>
     * <li>GiftMessage: string</li>
     * <li>DisplayableComment: string</li>
     * <li>FulfillmentNetworkSKU: string</li>
     * <li>OrderItemDisposition: string</li>
     * <li>PerUnitDeclaredValue: FBAOutboundServiceMWS_Model_Currency</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'SellerSKU' => array('FieldValue' => null, 'FieldType' => 'string'),
        'SellerFulfillmentOrderItemId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Quantity' => array('FieldValue' => null, 'FieldType' => 'int'),
        'GiftMessage' => array('FieldValue' => null, 'FieldType' => 'string'),
        'DisplayableComment' => array('FieldValue' => null, 'FieldType' => 'string'),
        'FulfillmentNetworkSKU' => array('FieldValue' => null, 'FieldType' => 'string'),
        'OrderItemDisposition' => array('FieldValue' => null, 'FieldType' => 'string'),
        'PerUnitDeclaredValue' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_Currency'),
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
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItem instance
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
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItem instance
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
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItem instance
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
     * Gets the value of the GiftMessage property.
     * 
     * @return string GiftMessage
     */
    public function getGiftMessage() 
    {
        return $this->_fields['GiftMessage']['FieldValue'];
    }

    /**
     * Sets the value of the GiftMessage property.
     * 
     * @param string GiftMessage
     * @return this instance
     */
    public function setGiftMessage($value) 
    {
        $this->_fields['GiftMessage']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the GiftMessage and returns this instance
     * 
     * @param string $value GiftMessage
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItem instance
     */
    public function withGiftMessage($value)
    {
        $this->setGiftMessage($value);
        return $this;
    }


    /**
     * Checks if GiftMessage is set
     * 
     * @return bool true if GiftMessage  is set
     */
    public function isSetGiftMessage()
    {
        return !is_null($this->_fields['GiftMessage']['FieldValue']);
    }

    /**
     * Gets the value of the DisplayableComment property.
     * 
     * @return string DisplayableComment
     */
    public function getDisplayableComment() 
    {
        return $this->_fields['DisplayableComment']['FieldValue'];
    }

    /**
     * Sets the value of the DisplayableComment property.
     * 
     * @param string DisplayableComment
     * @return this instance
     */
    public function setDisplayableComment($value) 
    {
        $this->_fields['DisplayableComment']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the DisplayableComment and returns this instance
     * 
     * @param string $value DisplayableComment
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItem instance
     */
    public function withDisplayableComment($value)
    {
        $this->setDisplayableComment($value);
        return $this;
    }


    /**
     * Checks if DisplayableComment is set
     * 
     * @return bool true if DisplayableComment  is set
     */
    public function isSetDisplayableComment()
    {
        return !is_null($this->_fields['DisplayableComment']['FieldValue']);
    }

    /**
     * Gets the value of the FulfillmentNetworkSKU property.
     * 
     * @return string FulfillmentNetworkSKU
     */
    public function getFulfillmentNetworkSKU() 
    {
        return $this->_fields['FulfillmentNetworkSKU']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentNetworkSKU property.
     * 
     * @param string FulfillmentNetworkSKU
     * @return this instance
     */
    public function setFulfillmentNetworkSKU($value) 
    {
        $this->_fields['FulfillmentNetworkSKU']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the FulfillmentNetworkSKU and returns this instance
     * 
     * @param string $value FulfillmentNetworkSKU
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItem instance
     */
    public function withFulfillmentNetworkSKU($value)
    {
        $this->setFulfillmentNetworkSKU($value);
        return $this;
    }


    /**
     * Checks if FulfillmentNetworkSKU is set
     * 
     * @return bool true if FulfillmentNetworkSKU  is set
     */
    public function isSetFulfillmentNetworkSKU()
    {
        return !is_null($this->_fields['FulfillmentNetworkSKU']['FieldValue']);
    }

    /**
     * Gets the value of the OrderItemDisposition property.
     * 
     * @return string OrderItemDisposition
     */
    public function getOrderItemDisposition() 
    {
        return $this->_fields['OrderItemDisposition']['FieldValue'];
    }

    /**
     * Sets the value of the OrderItemDisposition property.
     * 
     * @param string OrderItemDisposition
     * @return this instance
     */
    public function setOrderItemDisposition($value) 
    {
        $this->_fields['OrderItemDisposition']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the OrderItemDisposition and returns this instance
     * 
     * @param string $value OrderItemDisposition
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItem instance
     */
    public function withOrderItemDisposition($value)
    {
        $this->setOrderItemDisposition($value);
        return $this;
    }


    /**
     * Checks if OrderItemDisposition is set
     * 
     * @return bool true if OrderItemDisposition  is set
     */
    public function isSetOrderItemDisposition()
    {
        return !is_null($this->_fields['OrderItemDisposition']['FieldValue']);
    }

    /**
     * Gets the value of the PerUnitDeclaredValue.
     * 
     * @return Currency PerUnitDeclaredValue
     */
    public function getPerUnitDeclaredValue() 
    {
        return $this->_fields['PerUnitDeclaredValue']['FieldValue'];
    }

    /**
     * Sets the value of the PerUnitDeclaredValue.
     * 
     * @param Currency PerUnitDeclaredValue
     * @return void
     */
    public function setPerUnitDeclaredValue($value) 
    {
        $this->_fields['PerUnitDeclaredValue']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the PerUnitDeclaredValue  and returns this instance
     * 
     * @param Currency $value PerUnitDeclaredValue
     * @return FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItem instance
     */
    public function withPerUnitDeclaredValue($value)
    {
        $this->setPerUnitDeclaredValue($value);
        return $this;
    }


    /**
     * Checks if PerUnitDeclaredValue  is set
     * 
     * @return bool true if PerUnitDeclaredValue property is set
     */
    public function isSetPerUnitDeclaredValue()
    {
        return !is_null($this->_fields['PerUnitDeclaredValue']['FieldValue']);

    }




}