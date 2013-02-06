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
 * FBAOutboundServiceMWS_Model_FulfillmentShipmentItemList
 * 
 * Properties:
 * <ul>
 * 
 * <li>member: FBAOutboundServiceMWS_Model_FulfillmentShipmentItem</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_FulfillmentShipmentItemList extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_FulfillmentShipmentItemList
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>member: FBAOutboundServiceMWS_Model_FulfillmentShipmentItem</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'member' => array('FieldValue' => array(), 'FieldType' => array('FBAOutboundServiceMWS_Model_FulfillmentShipmentItem')),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the member.
     * 
     * @return array of FulfillmentShipmentItem member
     */
    public function getmember() 
    {
        return $this->_fields['member']['FieldValue'];
    }

    /**
     * Sets the value of the member.
     * 
     * @param mixed FulfillmentShipmentItem or an array of FulfillmentShipmentItem member
     * @return this instance
     */
    public function setmember($member) 
    {
        if (!$this->_isNumericArray($member)) {
            $member =  array ($member);    
        }
        $this->_fields['member']['FieldValue'] = $member;
        return $this;
    }


    /**
     * Sets single or multiple values of member list via variable number of arguments. 
     * For example, to set the list with two elements, simply pass two values as arguments to this function
     * <code>withmember($member1, $member2)</code>
     * 
     * @param FulfillmentShipmentItem  $fulfillmentShipmentItemArgs one or more member
     * @return FBAOutboundServiceMWS_Model_FulfillmentShipmentItemList  instance
     */
    public function withmember($fulfillmentShipmentItemArgs)
    {
        foreach (func_get_args() as $member) {
            $this->_fields['member']['FieldValue'][] = $member;
        }
        return $this;
    }   



    /**
     * Checks if member list is non-empty
     * 
     * @return bool true if member list is non-empty
     */
    public function isSetmember()
    {
        return count ($this->_fields['member']['FieldValue']) > 0;
    }




}