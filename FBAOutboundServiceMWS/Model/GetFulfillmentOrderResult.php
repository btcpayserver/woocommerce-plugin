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
 * FBAOutboundServiceMWS_Model_GetFulfillmentOrderResult
 * 
 * Properties:
 * <ul>
 * 
 * <li>FulfillmentOrder: FBAOutboundServiceMWS_Model_FulfillmentOrder</li>
 * <li>FulfillmentOrderItem: FBAOutboundServiceMWS_Model_FulfillmentOrderItemList</li>
 * <li>FulfillmentShipment: FBAOutboundServiceMWS_Model_FulfillmentShipmentList</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_GetFulfillmentOrderResult extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_GetFulfillmentOrderResult
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>FulfillmentOrder: FBAOutboundServiceMWS_Model_FulfillmentOrder</li>
     * <li>FulfillmentOrderItem: FBAOutboundServiceMWS_Model_FulfillmentOrderItemList</li>
     * <li>FulfillmentShipment: FBAOutboundServiceMWS_Model_FulfillmentShipmentList</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'FulfillmentOrder' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_FulfillmentOrder'),
        'FulfillmentOrderItem' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_FulfillmentOrderItemList'),
        'FulfillmentShipment' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_FulfillmentShipmentList'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the FulfillmentOrder.
     * 
     * @return FulfillmentOrder FulfillmentOrder
     */
    public function getFulfillmentOrder() 
    {
        return $this->_fields['FulfillmentOrder']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentOrder.
     * 
     * @param FulfillmentOrder FulfillmentOrder
     * @return void
     */
    public function setFulfillmentOrder($value) 
    {
        $this->_fields['FulfillmentOrder']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the FulfillmentOrder  and returns this instance
     * 
     * @param FulfillmentOrder $value FulfillmentOrder
     * @return FBAOutboundServiceMWS_Model_GetFulfillmentOrderResult instance
     */
    public function withFulfillmentOrder($value)
    {
        $this->setFulfillmentOrder($value);
        return $this;
    }


    /**
     * Checks if FulfillmentOrder  is set
     * 
     * @return bool true if FulfillmentOrder property is set
     */
    public function isSetFulfillmentOrder()
    {
        return !is_null($this->_fields['FulfillmentOrder']['FieldValue']);

    }

    /**
     * Gets the value of the FulfillmentOrderItem.
     * 
     * @return FulfillmentOrderItemList FulfillmentOrderItem
     */
    public function getFulfillmentOrderItem() 
    {
        return $this->_fields['FulfillmentOrderItem']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentOrderItem.
     * 
     * @param FulfillmentOrderItemList FulfillmentOrderItem
     * @return void
     */
    public function setFulfillmentOrderItem($value) 
    {
        $this->_fields['FulfillmentOrderItem']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the FulfillmentOrderItem  and returns this instance
     * 
     * @param FulfillmentOrderItemList $value FulfillmentOrderItem
     * @return FBAOutboundServiceMWS_Model_GetFulfillmentOrderResult instance
     */
    public function withFulfillmentOrderItem($value)
    {
        $this->setFulfillmentOrderItem($value);
        return $this;
    }


    /**
     * Checks if FulfillmentOrderItem  is set
     * 
     * @return bool true if FulfillmentOrderItem property is set
     */
    public function isSetFulfillmentOrderItem()
    {
        return !is_null($this->_fields['FulfillmentOrderItem']['FieldValue']);

    }

    /**
     * Gets the value of the FulfillmentShipment.
     * 
     * @return FulfillmentShipmentList FulfillmentShipment
     */
    public function getFulfillmentShipment() 
    {
        return $this->_fields['FulfillmentShipment']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentShipment.
     * 
     * @param FulfillmentShipmentList FulfillmentShipment
     * @return void
     */
    public function setFulfillmentShipment($value) 
    {
        $this->_fields['FulfillmentShipment']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the FulfillmentShipment  and returns this instance
     * 
     * @param FulfillmentShipmentList $value FulfillmentShipment
     * @return FBAOutboundServiceMWS_Model_GetFulfillmentOrderResult instance
     */
    public function withFulfillmentShipment($value)
    {
        $this->setFulfillmentShipment($value);
        return $this;
    }


    /**
     * Checks if FulfillmentShipment  is set
     * 
     * @return bool true if FulfillmentShipment property is set
     */
    public function isSetFulfillmentShipment()
    {
        return !is_null($this->_fields['FulfillmentShipment']['FieldValue']);

    }




}