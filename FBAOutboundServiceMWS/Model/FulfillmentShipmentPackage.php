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
 * FBAOutboundServiceMWS_Model_FulfillmentShipmentPackage
 * 
 * Properties:
 * <ul>
 * 
 * <li>PackageNumber: int</li>
 * <li>CarrierCode: string</li>
 * <li>TrackingNumber: string</li>
 * <li>EstimatedArrivalDateTime: string</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_FulfillmentShipmentPackage extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_FulfillmentShipmentPackage
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>PackageNumber: int</li>
     * <li>CarrierCode: string</li>
     * <li>TrackingNumber: string</li>
     * <li>EstimatedArrivalDateTime: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'PackageNumber' => array('FieldValue' => null, 'FieldType' => 'int'),
        'CarrierCode' => array('FieldValue' => null, 'FieldType' => 'string'),
        'TrackingNumber' => array('FieldValue' => null, 'FieldType' => 'string'),
        'EstimatedArrivalDateTime' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
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
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipmentPackage instance
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

    /**
     * Gets the value of the CarrierCode property.
     * 
     * @return string CarrierCode
     */
    public function getCarrierCode() 
    {
        return $this->_fields['CarrierCode']['FieldValue'];
    }

    /**
     * Sets the value of the CarrierCode property.
     * 
     * @param string CarrierCode
     * @return this instance
     */
    public function setCarrierCode($value) 
    {
        $this->_fields['CarrierCode']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the CarrierCode and returns this instance
     * 
     * @param string $value CarrierCode
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipmentPackage instance
     */
    public function withCarrierCode($value)
    {
        $this->setCarrierCode($value);
        return $this;
    }


    /**
     * Checks if CarrierCode is set
     * 
     * @return bool true if CarrierCode  is set
     */
    public function isSetCarrierCode()
    {
        return !is_null($this->_fields['CarrierCode']['FieldValue']);
    }

    /**
     * Gets the value of the TrackingNumber property.
     * 
     * @return string TrackingNumber
     */
    public function getTrackingNumber() 
    {
        return $this->_fields['TrackingNumber']['FieldValue'];
    }

    /**
     * Sets the value of the TrackingNumber property.
     * 
     * @param string TrackingNumber
     * @return this instance
     */
    public function setTrackingNumber($value) 
    {
        $this->_fields['TrackingNumber']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the TrackingNumber and returns this instance
     * 
     * @param string $value TrackingNumber
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipmentPackage instance
     */
    public function withTrackingNumber($value)
    {
        $this->setTrackingNumber($value);
        return $this;
    }


    /**
     * Checks if TrackingNumber is set
     * 
     * @return bool true if TrackingNumber  is set
     */
    public function isSetTrackingNumber()
    {
        return !is_null($this->_fields['TrackingNumber']['FieldValue']);
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
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipmentPackage instance
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




}