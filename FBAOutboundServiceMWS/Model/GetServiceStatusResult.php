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
 * FBAOutboundServiceMWS_Model_GetServiceStatusResult
 * 
 * Properties:
 * <ul>
 * 
 * <li>Status: string</li>
 * <li>Timestamp: string</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_GetServiceStatusResult extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_GetServiceStatusResult
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>Status: string</li>
     * <li>Timestamp: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'Status' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Timestamp' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the Status property.
     * 
     * @return string Status
     */
    public function getStatus() 
    {
        return $this->_fields['Status']['FieldValue'];
    }

    /**
     * Sets the value of the Status property.
     * 
     * @param string Status
     * @return this instance
     */
    public function setStatus($value) 
    {
        $this->_fields['Status']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Status and returns this instance
     * 
     * @param string $value Status
     * @return FBAOutboundServiceMWS_Model_GetServiceStatusResult instance
     */
    public function withStatus($value)
    {
        $this->setStatus($value);
        return $this;
    }


    /**
     * Checks if Status is set
     * 
     * @return bool true if Status  is set
     */
    public function isSetStatus()
    {
        return !is_null($this->_fields['Status']['FieldValue']);
    }

    /**
     * Gets the value of the Timestamp property.
     * 
     * @return string Timestamp
     */
    public function getTimestamp() 
    {
        return $this->_fields['Timestamp']['FieldValue'];
    }

    /**
     * Sets the value of the Timestamp property.
     * 
     * @param string Timestamp
     * @return this instance
     */
    public function setTimestamp($value) 
    {
        $this->_fields['Timestamp']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Timestamp and returns this instance
     * 
     * @param string $value Timestamp
     * @return FBAOutboundServiceMWS_Model_GetServiceStatusResult instance
     */
    public function withTimestamp($value)
    {
        $this->setTimestamp($value);
        return $this;
    }


    /**
     * Checks if Timestamp is set
     * 
     * @return bool true if Timestamp  is set
     */
    public function isSetTimestamp()
    {
        return !is_null($this->_fields['Timestamp']['FieldValue']);
    }




}