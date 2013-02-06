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
 * FBAOutboundServiceMWS_Model_FulfillmentShipmentItem
 * 
 * Properties:
 * <ul>
 * 
 * <li>SellerSKU: string</li>
 * <li>SellerFulfillmentOrderItemId: string</li>
 * <li>Quantity: int</li>
 * <li>PackageNumber: int</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_FulfillmentShipmentItem extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_FulfillmentShipmentItem
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>SellerSKU: string</li>
     * <li>SellerFulfillmentOrderItemId: string</li>
     * <li>Quantity: int</li>
     * <li>PackageNumber: int</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'SellerSKU' => array('FieldValue' => null, 'FieldType' => 'string'),
        'SellerFulfillmentOrderItemId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Quantity' => array('FieldValue' => null, 'FieldType' => 'int'),
        'PackageNumber' => array('FieldValue' => null, 'FieldType' => 'int'),
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
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipmentItem instance
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
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipmentItem instance
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
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipmentItem instance
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
     * Gets the value of the PackageNumber property.
     * 
     * @return int PackageNumber
     */
    public function getPackageNumber() 
    {
        return $this->_fields['PackageNumber']['FieldValue'];
    }

    /**
     * Sets the value of the PackageNumber property.
     * 
     * @param int PackageNumber
     * @return this instance
     */
    public function setPackageNumber($value) 
    {
        $this->_fields['PackageNumber']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the PackageNumber and returns this instance
     * 
     * @param int $value PackageNumber
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipmentItem instance
     */
    public function withPackageNumber($value)
    {
        $this->setPackageNumber($value);
        return $this;
    }


    /**
     * Checks if PackageNumber is set
     * 
     * @return bool true if PackageNumber  is set
     */
    public function isSetPackageNumber()
    {
        return !is_null($this->_fields['PackageNumber']['FieldValue']);
    }




}