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
 * FBAOutboundServiceMWS_Model_Fee
 * 
 * Properties:
 * <ul>
 * 
 * <li>Name: string</li>
 * <li>Amount: FBAOutboundServiceMWS_Model_Currency</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_Fee extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_Fee
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>Name: string</li>
     * <li>Amount: FBAOutboundServiceMWS_Model_Currency</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'Name' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Amount' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_Currency'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the Name property.
     * 
     * @return string Name
     */
    public function getName() 
    {
        return $this->_fields['Name']['FieldValue'];
    }

    /**
     * Sets the value of the Name property.
     * 
     * @param string Name
     * @return this instance
     */
    public function setName($value) 
    {
        $this->_fields['Name']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Name and returns this instance
     * 
     * @param string $value Name
     * @return FBAOutboundServiceMWS_Model_Fee instance
     */
    public function withName($value)
    {
        $this->setName($value);
        return $this;
    }


    /**
     * Checks if Name is set
     * 
     * @return bool true if Name  is set
     */
    public function isSetName()
    {
        return !is_null($this->_fields['Name']['FieldValue']);
    }

    /**
     * Gets the value of the Amount.
     * 
     * @return Currency Amount
     */
    public function getAmount() 
    {
        return $this->_fields['Amount']['FieldValue'];
    }

    /**
     * Sets the value of the Amount.
     * 
     * @param Currency Amount
     * @return void
     */
    public function setAmount($value) 
    {
        $this->_fields['Amount']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the Amount  and returns this instance
     * 
     * @param Currency $value Amount
     * @return FBAOutboundServiceMWS_Model_Fee instance
     */
    public function withAmount($value)
    {
        $this->setAmount($value);
        return $this;
    }


    /**
     * Checks if Amount  is set
     * 
     * @return bool true if Amount property is set
     */
    public function isSetAmount()
    {
        return !is_null($this->_fields['Amount']['FieldValue']);

    }




}