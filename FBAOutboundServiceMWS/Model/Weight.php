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
 * FBAOutboundServiceMWS_Model_Weight
 * 
 * Properties:
 * <ul>
 * 
 * <li>Unit: string</li>
 * <li>Value: string</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_Weight extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_Weight
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>Unit: string</li>
     * <li>Value: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'Unit' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Value' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the Unit property.
     * 
     * @return string Unit
     */
    public function getUnit() 
    {
        return $this->_fields['Unit']['FieldValue'];
    }

    /**
     * Sets the value of the Unit property.
     * 
     * @param string Unit
     * @return this instance
     */
    public function setUnit($value) 
    {
        $this->_fields['Unit']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Unit and returns this instance
     * 
     * @param string $value Unit
     * @return FBAOutboundServiceMWS_Model_Weight instance
     */
    public function withUnit($value)
    {
        $this->setUnit($value);
        return $this;
    }


    /**
     * Checks if Unit is set
     * 
     * @return bool true if Unit  is set
     */
    public function isSetUnit()
    {
        return !is_null($this->_fields['Unit']['FieldValue']);
    }

    /**
     * Gets the value of the Value property.
     * 
     * @return string Value
     */
    public function getValue() 
    {
        return $this->_fields['Value']['FieldValue'];
    }

    /**
     * Sets the value of the Value property.
     * 
     * @param string Value
     * @return this instance
     */
    public function setValue($value) 
    {
        $this->_fields['Value']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Value and returns this instance
     * 
     * @param string $value Value
     * @return FBAOutboundServiceMWS_Model_Weight instance
     */
    public function withValue($value)
    {
        $this->setValue($value);
        return $this;
    }


    /**
     * Checks if Value is set
     * 
     * @return bool true if Value  is set
     */
    public function isSetValue()
    {
        return !is_null($this->_fields['Value']['FieldValue']);
    }




}