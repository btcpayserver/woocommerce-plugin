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
 * FBAOutboundServiceMWS_Model_FulfillmentShipment
 * 
 * Properties:
 * <ul>
 * 
 * <li>AmazonShipmentId: string</li>
 * <li>FulfillmentCenterId: string</li>
 * <li>FulfillmentShipmentStatus: string</li>
 * <li>ShippingDateTime: string</li>
 * <li>EstimatedArrivalDateTime: string</li>
 * <li>FulfillmentShipmentItem: FBAOutboundServiceMWS_Model_FulfillmentShipmentItemList</li>
 * <li>FulfillmentShipmentPackage: FBAOutboundServiceMWS_Model_FulfillmentShipmentPackageList</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_FulfillmentShipment extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_FulfillmentShipment
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>AmazonShipmentId: string</li>
     * <li>FulfillmentCenterId: string</li>
     * <li>FulfillmentShipmentStatus: string</li>
     * <li>ShippingDateTime: string</li>
     * <li>EstimatedArrivalDateTime: string</li>
     * <li>FulfillmentShipmentItem: FBAOutboundServiceMWS_Model_FulfillmentShipmentItemList</li>
     * <li>FulfillmentShipmentPackage: FBAOutboundServiceMWS_Model_FulfillmentShipmentPackageList</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'AmazonShipmentId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'FulfillmentCenterId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'FulfillmentShipmentStatus' => array('FieldValue' => null, 'FieldType' => 'string'),
        'ShippingDateTime' => array('FieldValue' => null, 'FieldType' => 'string'),
        'EstimatedArrivalDateTime' => array('FieldValue' => null, 'FieldType' => 'string'),
        'FulfillmentShipmentItem' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_FulfillmentShipmentItemList'),
        'FulfillmentShipmentPackage' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_FulfillmentShipmentPackageList'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the AmazonShipmentId property.
     * 
     * @return string AmazonShipmentId
     */
    public function getAmazonShipmentId() 
    {
        return $this->_fields['AmazonShipmentId']['FieldValue'];
    }

    /**
     * Sets the value of the AmazonShipmentId property.
     * 
     * @param string AmazonShipmentId
     * @return this instance
     */
    public function setAmazonShipmentId($value) 
    {
        $this->_fields['AmazonShipmentId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the AmazonShipmentId and returns this instance
     * 
     * @param string $value AmazonShipmentId
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipment instance
     */
    public function withAmazonShipmentId($value)
    {
        $this->setAmazonShipmentId($value);
        return $this;
    }


    /**
     * Checks if AmazonShipmentId is set
     * 
     * @return bool true if AmazonShipmentId  is set
     */
    public function isSetAmazonShipmentId()
    {
        return !is_null($this->_fields['AmazonShipmentId']['FieldValue']);
    }

    /**
     * Gets the value of the FulfillmentCenterId property.
     * 
     * @return string FulfillmentCenterId
     */
    public function getFulfillmentCenterId() 
    {
        return $this->_fields['FulfillmentCenterId']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentCenterId property.
     * 
     * @param string FulfillmentCenterId
     * @return this instance
     */
    public function setFulfillmentCenterId($value) 
    {
        $this->_fields['FulfillmentCenterId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the FulfillmentCenterId and returns this instance
     * 
     * @param string $value FulfillmentCenterId
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipment instance
     */
    public function withFulfillmentCenterId($value)
    {
        $this->setFulfillmentCenterId($value);
        return $this;
    }


    /**
     * Checks if FulfillmentCenterId is set
     * 
     * @return bool true if FulfillmentCenterId  is set
     */
    public function isSetFulfillmentCenterId()
    {
        return !is_null($this->_fields['FulfillmentCenterId']['FieldValue']);
    }

    /**
     * Gets the value of the FulfillmentShipmentStatus property.
     * 
     * @return string FulfillmentShipmentStatus
     */
    public function getFulfillmentShipmentStatus() 
    {
        return $this->_fields['FulfillmentShipmentStatus']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentShipmentStatus property.
     * 
     * @param string FulfillmentShipmentStatus
     * @return this instance
     */
    public function setFulfillmentShipmentStatus($value) 
    {
        $this->_fields['FulfillmentShipmentStatus']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the FulfillmentShipmentStatus and returns this instance
     * 
     * @param string $value FulfillmentShipmentStatus
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipment instance
     */
    public function withFulfillmentShipmentStatus($value)
    {
        $this->setFulfillmentShipmentStatus($value);
        return $this;
    }


    /**
     * Checks if FulfillmentShipmentStatus is set
     * 
     * @return bool true if FulfillmentShipmentStatus  is set
     */
    public function isSetFulfillmentShipmentStatus()
    {
        return !is_null($this->_fields['FulfillmentShipmentStatus']['FieldValue']);
    }

    /**
     * Gets the value of the ShippingDateTime property.
     * 
     * @return string ShippingDateTime
     */
    public function getShippingDateTime() 
    {
        return $this->_fields['ShippingDateTime']['FieldValue'];
    }

    /**
     * Sets the value of the ShippingDateTime property.
     * 
     * @param string ShippingDateTime
     * @return this instance
     */
    public function setShippingDateTime($value) 
    {
        $this->_fields['ShippingDateTime']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the ShippingDateTime and returns this instance
     * 
     * @param string $value ShippingDateTime
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipment instance
     */
    public function withShippingDateTime($value)
    {
        $this->setShippingDateTime($value);
        return $this;
    }


    /**
     * Checks if ShippingDateTime is set
     * 
     * @return bool true if ShippingDateTime  is set
     */
    public function isSetShippingDateTime()
    {
        return !is_null($this->_fields['ShippingDateTime']['FieldValue']);
    }

    /**
     * Gets the value of the EstimatedArrivalDateTime property.
     * 
     * @return string EstimatedArrivalDateTime
     */
    public function getEstimatedArrivalDateTime() 
    {
        return $this->_fields['EstimatedArrivalDateTime']['FieldValue'];
    }

    /**
     * Sets the value of the EstimatedArrivalDateTime property.
     * 
     * @param string EstimatedArrivalDateTime
     * @return this instance
     */
    public function setEstimatedArrivalDateTime($value) 
    {
        $this->_fields['EstimatedArrivalDateTime']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the EstimatedArrivalDateTime and returns this instance
     * 
     * @param string $value EstimatedArrivalDateTime
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipment instance
     */
    public function withEstimatedArrivalDateTime($value)
    {
        $this->setEstimatedArrivalDateTime($value);
        return $this;
    }


    /**
     * Checks if EstimatedArrivalDateTime is set
     * 
     * @return bool true if EstimatedArrivalDateTime  is set
     */
    public function isSetEstimatedArrivalDateTime()
    {
        return !is_null($this->_fields['EstimatedArrivalDateTime']['FieldValue']);
    }

    /**
     * Gets the value of the FulfillmentShipmentItem.
     * 
     * @return FulfillmentShipmentItemList FulfillmentShipmentItem
     */
    public function getFulfillmentShipmentItem() 
    {
        return $this->_fields['FulfillmentShipmentItem']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentShipmentItem.
     * 
     * @param FulfillmentShipmentItemList FulfillmentShipmentItem
     * @return void
     */
    public function setFulfillmentShipmentItem($value) 
    {
        $this->_fields['FulfillmentShipmentItem']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the FulfillmentShipmentItem  and returns this instance
     * 
     * @param FulfillmentShipmentItemList $value FulfillmentShipmentItem
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipment instance
     */
    public function withFulfillmentShipmentItem($value)
    {
        $this->setFulfillmentShipmentItem($value);
        return $this;
    }


    /**
     * Checks if FulfillmentShipmentItem  is set
     * 
     * @return bool true if FulfillmentShipmentItem property is set
     */
    public function isSetFulfillmentShipmentItem()
    {
        return !is_null($this->_fields['FulfillmentShipmentItem']['FieldValue']);

    }

    /**
     * Gets the value of the FulfillmentShipmentPackage.
     * 
     * @return FulfillmentShipmentPackageList FulfillmentShipmentPackage
     */
    public function getFulfillmentShipmentPackage() 
    {
        return $this->_fields['FulfillmentShipmentPackage']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentShipmentPackage.
     * 
     * @param FulfillmentShipmentPackageList FulfillmentShipmentPackage
     * @return void
     */
    public function setFulfillmentShipmentPackage($value) 
    {
        $this->_fields['FulfillmentShipmentPackage']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the FulfillmentShipmentPackage  and returns this instance
     * 
     * @param FulfillmentShipmentPackageList $value FulfillmentShipmentPackage
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipment instance
     */
    public function withFulfillmentShipmentPackage($value)
    {
        $this->setFulfillmentShipmentPackage($value);
        return $this;
    }


    /**
     * Checks if FulfillmentShipmentPackage  is set
     * 
     * @return bool true if FulfillmentShipmentPackage property is set
     */
    public function isSetFulfillmentShipmentPackage()
    {
        return !is_null($this->_fields['FulfillmentShipmentPackage']['FieldValue']);

    }




}