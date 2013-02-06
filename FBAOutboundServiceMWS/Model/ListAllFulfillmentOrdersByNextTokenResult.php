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
 * FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResult
 * 
 * Properties:
 * <ul>
 * 
 * <li>NextToken: string</li>
 * <li>FulfillmentOrders: FBAOutboundServiceMWS_Model_FulfillmentOrderList</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResult extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResult
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>NextToken: string</li>
     * <li>FulfillmentOrders: FBAOutboundServiceMWS_Model_FulfillmentOrderList</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'NextToken' => array('FieldValue' => null, 'FieldType' => 'string'),
        'FulfillmentOrders' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_FulfillmentOrderList'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the NextToken property.
     * 
     * @return string NextToken
     */
    public function getNextToken() 
    {
        return $this->_fields['NextToken']['FieldValue'];
    }

    /**
     * Sets the value of the NextToken property.
     * 
     * @param string NextToken
     * @return this instance
     */
    public function setNextToken($value) 
    {
        $this->_fields['NextToken']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the NextToken and returns this instance
     * 
     * @param string $value NextToken
     * @return FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResult instance
     */
    public function withNextToken($value)
    {
        $this->setNextToken($value);
        return $this;
    }


    /**
     * Checks if NextToken is set
     * 
     * @return bool true if NextToken  is set
     */
    public function isSetNextToken()
    {
        return !is_null($this->_fields['NextToken']['FieldValue']);
    }

    /**
     * Gets the value of the FulfillmentOrders.
     * 
     * @return FulfillmentOrderList FulfillmentOrders
     */
    public function getFulfillmentOrders() 
    {
        return $this->_fields['FulfillmentOrders']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentOrders.
     * 
     * @param FulfillmentOrderList FulfillmentOrders
     * @return void
     */
    public function setFulfillmentOrders($value) 
    {
        $this->_fields['FulfillmentOrders']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the FulfillmentOrders  and returns this instance
     * 
     * @param FulfillmentOrderList $value FulfillmentOrders
     * @return FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResult instance
     */
    public function withFulfillmentOrders($value)
    {
        $this->setFulfillmentOrders($value);
        return $this;
    }


    /**
     * Checks if FulfillmentOrders  is set
     * 
     * @return bool true if FulfillmentOrders property is set
     */
    public function isSetFulfillmentOrders()
    {
        return !is_null($this->_fields['FulfillmentOrders']['FieldValue']);

    }




}