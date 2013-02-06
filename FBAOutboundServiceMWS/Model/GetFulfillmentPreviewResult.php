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
 * FBAOutboundServiceMWS_Model_GetFulfillmentPreviewResult
 * 
 * Properties:
 * <ul>
 * 
 * <li>FulfillmentPreviews: FBAOutboundServiceMWS_Model_FulfillmentPreviewList</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_GetFulfillmentPreviewResult extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_GetFulfillmentPreviewResult
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>FulfillmentPreviews: FBAOutboundServiceMWS_Model_FulfillmentPreviewList</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'FulfillmentPreviews' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_FulfillmentPreviewList'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the FulfillmentPreviews.
     * 
     * @return FulfillmentPreviewList FulfillmentPreviews
     */
    public function getFulfillmentPreviews() 
    {
        return $this->_fields['FulfillmentPreviews']['FieldValue'];
    }

    /**
     * Sets the value of the FulfillmentPreviews.
     * 
     * @param FulfillmentPreviewList FulfillmentPreviews
     * @return void
     */
    public function setFulfillmentPreviews($value) 
    {
        $this->_fields['FulfillmentPreviews']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the FulfillmentPreviews  and returns this instance
     * 
     * @param FulfillmentPreviewList $value FulfillmentPreviews
     * @return FBAOutboundServiceMWS_Model_GetFulfillmentPreviewResult instance
     */
    public function withFulfillmentPreviews($value)
    {
        $this->setFulfillmentPreviews($value);
        return $this;
    }


    /**
     * Checks if FulfillmentPreviews  is set
     * 
     * @return bool true if FulfillmentPreviews property is set
     */
    public function isSetFulfillmentPreviews()
    {
        return !is_null($this->_fields['FulfillmentPreviews']['FieldValue']);

    }




}