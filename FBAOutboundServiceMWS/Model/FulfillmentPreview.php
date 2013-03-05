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
 * FBAOutboundServiceMWS_Model_FulfillmentPreview
 * 
 * Properties:
 * <ul>
 * 
 * <li>ShippingSpeedCategory: string</li>
 * <li>IsFulfillable: bool</li>
 * <li>EstimatedShippingWeight: FBAOutboundServiceMWS_Model_Weight</li>
 * <li>EstimatedFees: FBAOutboundServiceMWS_Model_FeeList</li>
 * <li>FulfillmentPreviewShipments: FBAOutboundServiceMWS_Model_FulfillmentPreviewShipmentList</li>
 * <li>UnfulfillablePreviewItems: FBAOutboundServiceMWS_Model_UnfulfillablePreviewItemList</li>
 * <li>OrderUnfulfillableReasons: FBAOutboundServiceMWS_Model_StringList</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_FulfillmentPreview extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_FulfillmentPreview
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>ShippingSpeedCategory: string</li>
     * <li>IsFulfillable: bool</li>
     * <li>EstimatedShippingWeight: FBAOutboundServiceMWS_Model_Weight</li>
     * <li>EstimatedFees: FBAOutboundServiceMWS_Model_FeeList</li>
     * <li>FulfillmentPreviewShipments: FBAOutboundServiceMWS_Model_FulfillmentPreviewShipmentList</li>
     * <li>UnfulfillablePreviewItems: FBAOutboundServiceMWS_Model_UnfulfillablePreviewItemList</li>
     * <li>OrderUnfulfillableReasons: FBAOutboundServiceMWS_Model_StringList</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'ShippingSpeedCategory' => array('FieldValue' => null, 'FieldType' => 'string'),
        'IsFulfillable' => array('FieldValue' => null, 'FieldType' => 'bool'),
        'EstimatedShippingWeight' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_Weight'),
        'EstimatedFees' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_FeeList'),
        'FulfillmentPreviewShipments' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_FulfillmentPreviewShipmentList'),
        'UnfulfillablePreviewItems' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_UnfulfillablePreviewItemList'),
        'OrderUnfulfillableReasons' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_StringList'),
        );
        parent::__construct($data);
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
     * @return FBAOutboundServiceMWS_Model_FulfillmentPreview instance
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
     * Gets the value of the IsFulfillable property.
     * 
     * @return bool IsFulfillable
     */
    public function getIsFulfillable() 
    {
        return $this->_fields['IsFulfillable']['FieldValue'];
    }

    /**
     * Sets the value of the IsFulfillable property.
     * 
     * @param bool IsFulfillable
     * @return this instance
     */
    public function setIsFulfillable($value) 
    {
        $this->_fields['IsFulfillable']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the IsFulfillable and returns this instance
     * 
     * @param bool $value IsFulfillable
     * @return FBAOutboundServiceMWS_Model_FulfillmentPreview instance
     */
    public function withIsFulfillable($value)
    {
        $this->setIsFulfillable($value);
        return $this;
    }


    /**
     * Checks if IsFulfillable is set
     * 
     * @return bool true if IsFulfillable  is set
     */
    public function isSetIsFulfillable()
    {
        return !is_null($this->_fields['IsFulfillable']['FieldValue']);
    }

    /**
     * Gets the value of the EstimatedShippingWeight.
     * 
     * @return Weight EstimatedShippingWeight
     */
    public function getEstimatedShippingWeight() 
    {
        return $this->_fields['EstimatedShippingWeight']['FieldValue'];
    }

    /**
     * Sets the value of the EstimatedShippingWeight.
     * 
     * @param Weight EstimatedShippingWeight
     * @return void
     */
    public function setEstimatedShippingWeight($value) 
    {
        $this->_fields['EstimatedShippingWeight']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the EstimatedShippingWeight  and returns this instance
     * 
     * @param Weight $value EstimatedShippingWeight
     * @return FBAOutboundServiceMWS_Model_FulfillmentPreview instance
     */
    public function withEstimatedShippingWeight($value)
    {
        $this->setEstimatedShippingWeight($value);
        return $this;
    }


    /**
     * Checks if EstimatedShippingWeight  is set
     * 
     * @return bool true if EstimatedShippingWeight property is set
     */
    public function isSetEstimatedShippingWeight()
    {
        return !is_null($this->_fields['EstimatedShippingWeight']['FieldValue']);

    }

    /**
     * Gets the value of the EstimatedFees.
     * 
     * @return FeeList EstimatedFees
     */
    public function getEstimatedFees() 
    {
        return $this->_fields['EstimatedFees']['FieldValue'];
    }

    /**
     * Sets the value of the EstimatedFees.
     * 
     * @param FeeList EstimatedFees
     * @return void
     */
    public function setEstimatedFees($value) 
    {
        $this->_fields['EstimatedFees']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the EstimatedFees  and returns this instance
     * 
     * @param FeeList $value EstimatedFees
     * @return FBAOutboundServiceMWS_Model_FulfillmentPreview instance
     */
    public function withEstimatedFees($value)
    {
        $this->setEstimatedFees($value);
        return $this;
    }


    /**
     * Checks if EstimatedFees  is set
     * 
     * @return bool true if EstimatedFees property is set
     */
    public function isSetEstimatedFees()
    {
        return !is_null($this->_fields['EstimatedFees']['FieldValue']);

    }

    /**
     * Gets the value of the FulfillmentPreviewShipments.
     * 
     * @return FulfillmentPreviewShipmentList FulfillmentPreviewShipments
     */
    public function getFulfillmentPreviewShipments() 
    {
        return $this->_fields['FulfillmentPreviewShipments']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentPreviewShipments.
     * 
     * @param FulfillmentPreviewShipmentList FulfillmentPreviewShipments
     * @return void
     */
    public function setFulfillmentPreviewShipments($value) 
    {
        $this->_fields['FulfillmentPreviewShipments']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the FulfillmentPreviewShipments  and returns this instance
     * 
     * @param FulfillmentPreviewShipmentList $value FulfillmentPreviewShipments
     * @return FBAOutboundServiceMWS_Model_FulfillmentPreview instance
     */
    public function withFulfillmentPreviewShipments($value)
    {
        $this->setFulfillmentPreviewShipments($value);
        return $this;
    }


    /**
     * Checks if FulfillmentPreviewShipments  is set
     * 
     * @return bool true if FulfillmentPreviewShipments property is set
     */
    public function isSetFulfillmentPreviewShipments()
    {
        return !is_null($this->_fields['FulfillmentPreviewShipments']['FieldValue']);

    }

    /**
     * Gets the value of the UnfulfillablePreviewItems.
     * 
     * @return UnfulfillablePreviewItemList UnfulfillablePreviewItems
     */
    public function getUnfulfillablePreviewItems() 
    {
        return $this->_fields['UnfulfillablePreviewItems']['FieldValue'];
    }

    /**
     * Sets the value of the UnfulfillablePreviewItems.
     * 
     * @param UnfulfillablePreviewItemList UnfulfillablePreviewItems
     * @return void
     */
    public function setUnfulfillablePreviewItems($value) 
    {
        $this->_fields['UnfulfillablePreviewItems']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the UnfulfillablePreviewItems  and returns this instance
     * 
     * @param UnfulfillablePreviewItemList $value UnfulfillablePreviewItems
     * @return FBAOutboundServiceMWS_Model_FulfillmentPreview instance
     */
    public function withUnfulfillablePreviewItems($value)
    {
        $this->setUnfulfillablePreviewItems($value);
        return $this;
    }


    /**
     * Checks if UnfulfillablePreviewItems  is set
     * 
     * @return bool true if UnfulfillablePreviewItems property is set
     */
    public function isSetUnfulfillablePreviewItems()
    {
        return !is_null($this->_fields['UnfulfillablePreviewItems']['FieldValue']);

    }

    /**
     * Gets the value of the OrderUnfulfillableReasons.
     * 
     * @return StringList OrderUnfulfillableReasons
     */
    public function getOrderUnfulfillableReasons() 
    {
        return $this->_fields['OrderUnfulfillableReasons']['FieldValue'];
    }

    /**
     * Sets the value of the OrderUnfulfillableReasons.
     * 
     * @param StringList OrderUnfulfillableReasons
     * @return void
     */
    public function setOrderUnfulfillableReasons($value) 
    {
        $this->_fields['OrderUnfulfillableReasons']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the OrderUnfulfillableReasons  and returns this instance
     * 
     * @param StringList $value OrderUnfulfillableReasons
     * @return FBAOutboundServiceMWS_Model_FulfillmentPreview instance
     */
    public function withOrderUnfulfillableReasons($value)
    {
        $this->setOrderUnfulfillableReasons($value);
        return $this;
    }


    /**
     * Checks if OrderUnfulfillableReasons  is set
     * 
     * @return bool true if OrderUnfulfillableReasons property is set
     */
    public function isSetOrderUnfulfillableReasons()
    {
        return !is_null($this->_fields['OrderUnfulfillableReasons']['FieldValue']);

    }




}