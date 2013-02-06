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
 * FBAOutboundServiceMWS_Model_FulfillmentPreviewShipment
 * 
 * Properties:
 * <ul>
 * 
 * <li>EarliestShipDate: string</li>
 * <li>LatestShipDate: string</li>
 * <li>EarliestArrivalDate: string</li>
 * <li>LatestArrivalDate: string</li>
 * <li>FulfillmentPreviewItems: FBAOutboundServiceMWS_Model_FulfillmentPreviewItemList</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_FulfillmentPreviewShipment extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_FulfillmentPreviewShipment
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>EarliestShipDate: string</li>
     * <li>LatestShipDate: string</li>
     * <li>EarliestArrivalDate: string</li>
     * <li>LatestArrivalDate: string</li>
     * <li>FulfillmentPreviewItems: FBAOutboundServiceMWS_Model_FulfillmentPreviewItemList</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'EarliestShipDate' => array('FieldValue' => null, 'FieldType' => 'string'),
        'LatestShipDate' => array('FieldValue' => null, 'FieldType' => 'string'),
        'EarliestArrivalDate' => array('FieldValue' => null, 'FieldType' => 'string'),
        'LatestArrivalDate' => array('FieldValue' => null, 'FieldType' => 'string'),
        'FulfillmentPreviewItems' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_FulfillmentPreviewItemList'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the EarliestShipDate property.
     * 
     * @return string EarliestShipDate
     */
    public function getEarliestShipDate() 
    {
        return $this->_fields['EarliestShipDate']['FieldValue'];
    }

    /**
     * Sets the value of the EarliestShipDate property.
     * 
     * @param string EarliestShipDate
     * @return this instance
     */
    public function setEarliestShipDate($value) 
    {
        $this->_fields['EarliestShipDate']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the EarliestShipDate and returns this instance
     * 
     * @param string $value EarliestShipDate
     * @return FBAOutboundServiceMWS_Model_FulfillmentPreviewShipment instance
     */
    public function withEarliestShipDate($value)
    {
        $this->setEarliestShipDate($value);
        return $this;
    }


    /**
     * Checks if EarliestShipDate is set
     * 
     * @return bool true if EarliestShipDate  is set
     */
    public function isSetEarliestShipDate()
    {
        return !is_null($this->_fields['EarliestShipDate']['FieldValue']);
    }

    /**
     * Gets the value of the LatestShipDate property.
     * 
     * @return string LatestShipDate
     */
    public function getLatestShipDate() 
    {
        return $this->_fields['LatestShipDate']['FieldValue'];
    }

    /**
     * Sets the value of the LatestShipDate property.
     * 
     * @param string LatestShipDate
     * @return this instance
     */
    public function setLatestShipDate($value) 
    {
        $this->_fields['LatestShipDate']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the LatestShipDate and returns this instance
     * 
     * @param string $value LatestShipDate
     * @return FBAOutboundServiceMWS_Model_FulfillmentPreviewShipment instance
     */
    public function withLatestShipDate($value)
    {
        $this->setLatestShipDate($value);
        return $this;
    }


    /**
     * Checks if LatestShipDate is set
     * 
     * @return bool true if LatestShipDate  is set
     */
    public function isSetLatestShipDate()
    {
        return !is_null($this->_fields['LatestShipDate']['FieldValue']);
    }

    /**
     * Gets the value of the EarliestArrivalDate property.
     * 
     * @return string EarliestArrivalDate
     */
    public function getEarliestArrivalDate() 
    {
        return $this->_fields['EarliestArrivalDate']['FieldValue'];
    }

    /**
     * Sets the value of the EarliestArrivalDate property.
     * 
     * @param string EarliestArrivalDate
     * @return this instance
     */
    public function setEarliestArrivalDate($value) 
    {
        $this->_fields['EarliestArrivalDate']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the EarliestArrivalDate and returns this instance
     * 
     * @param string $value EarliestArrivalDate
     * @return FBAOutboundServiceMWS_Model_FulfillmentPreviewShipment instance
     */
    public function withEarliestArrivalDate($value)
    {
        $this->setEarliestArrivalDate($value);
        return $this;
    }


    /**
     * Checks if EarliestArrivalDate is set
     * 
     * @return bool true if EarliestArrivalDate  is set
     */
    public function isSetEarliestArrivalDate()
    {
        return !is_null($this->_fields['EarliestArrivalDate']['FieldValue']);
    }

    /**
     * Gets the value of the LatestArrivalDate property.
     * 
     * @return string LatestArrivalDate
     */
    public function getLatestArrivalDate() 
    {
        return $this->_fields['LatestArrivalDate']['FieldValue'];
    }

    /**
     * Sets the value of the LatestArrivalDate property.
     * 
     * @param string LatestArrivalDate
     * @return this instance
     */
    public function setLatestArrivalDate($value) 
    {
        $this->_fields['LatestArrivalDate']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the LatestArrivalDate and returns this instance
     * 
     * @param string $value LatestArrivalDate
     * @return FBAOutboundServiceMWS_Model_FulfillmentPreviewShipment instance
     */
    public function withLatestArrivalDate($value)
    {
        $this->setLatestArrivalDate($value);
        return $this;
    }


    /**
     * Checks if LatestArrivalDate is set
     * 
     * @return bool true if LatestArrivalDate  is set
     */
    public function isSetLatestArrivalDate()
    {
        return !is_null($this->_fields['LatestArrivalDate']['FieldValue']);
    }

    /**
     * Gets the value of the FulfillmentPreviewItems.
     * 
     * @return FulfillmentPreviewItemList FulfillmentPreviewItems
     */
    public function getFulfillmentPreviewItems() 
    {
        return $this->_fields['FulfillmentPreviewItems']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentPreviewItems.
     * 
     * @param FulfillmentPreviewItemList FulfillmentPreviewItems
     * @return void
     */
    public function setFulfillmentPreviewItems($value) 
    {
        $this->_fields['FulfillmentPreviewItems']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the FulfillmentPreviewItems  and returns this instance
     * 
     * @param FulfillmentPreviewItemList $value FulfillmentPreviewItems
     * @return FBAOutboundServiceMWS_Model_FulfillmentPreviewShipment instance
     */
    public function withFulfillmentPreviewItems($value)
    {
        $this->setFulfillmentPreviewItems($value);
        return $this;
    }


    /**
     * Checks if FulfillmentPreviewItems  is set
     * 
     * @return bool true if FulfillmentPreviewItems property is set
     */
    public function isSetFulfillmentPreviewItems()
    {
        return !is_null($this->_fields['FulfillmentPreviewItems']['FieldValue']);

    }




}