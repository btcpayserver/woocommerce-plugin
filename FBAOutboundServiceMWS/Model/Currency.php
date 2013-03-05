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
 * FBAOutboundServiceMWS_Model_Currency
 * 
 * Properties:
 * <ul>
 * 
 * <li>CurrencyCode: string</li>
 * <li>Value: string</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_Currency extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_Currency
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>CurrencyCode: string</li>
     * <li>Value: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'CurrencyCode' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Value' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the CurrencyCode property.
     * 
     * @return string CurrencyCode
     */
    public function getCurrencyCode() 
    {
        return $this->_fields['CurrencyCode']['FieldValue'];
    }

    /**
     * Sets the value of the CurrencyCode property.
     * 
     * @param string CurrencyCode
     * @return this instance
     */
    public function setCurrencyCode($value) 
    {
        $this->_fields['CurrencyCode']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the CurrencyCode and returns this instance
     * 
     * @param string $value CurrencyCode
     * @return FBAOutboundServiceMWS_Model_Currency instance
     */
    public function withCurrencyCode($value)
    {
        $this->setCurrencyCode($value);
        return $this;
    }


    /**
     * Checks if CurrencyCode is set
     * 
     * @return bool true if CurrencyCode  is set
     */
    public function isSetCurrencyCode()
    {
        return !is_null($this->_fields['CurrencyCode']['FieldValue']);
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
     * @return FBAOutboundServiceMWS_Model_Currency instance
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