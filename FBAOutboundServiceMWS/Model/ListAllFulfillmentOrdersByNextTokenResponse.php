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
 * FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResponse
 * 
 * Properties:
 * <ul>
 * 
 * <li>ListAllFulfillmentOrdersByNextTokenResult: FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResult</li>
 * <li>ResponseMetadata: FBAOutboundServiceMWS_Model_ResponseMetadata</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResponse extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResponse
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>ListAllFulfillmentOrdersByNextTokenResult: FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResult</li>
     * <li>ResponseMetadata: FBAOutboundServiceMWS_Model_ResponseMetadata</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'ListAllFulfillmentOrdersByNextTokenResult' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResult'),
        'ResponseMetadata' => array('FieldValue' => null, 'FieldType' => 'FBAOutboundServiceMWS_Model_ResponseMetadata'),
        );
        parent::__construct($data);
    }

       
    /**
     * Construct FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResponse from XML string
     * 
     * @param string $xml XML string to construct from
     * @return FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResponse 
     */
    public static function fromXML($xml)
    {
        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $xpath = new DOMXPath($dom);
    	$xpath->registerNamespace('a', 'http://mws.amazonaws.com/FulfillmentOutboundShipment/2010-10-01/');
        $response = $xpath->query('//a:ListAllFulfillmentOrdersByNextTokenResponse');
        if ($response->length == 1) {
            return new FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResponse(($response->item(0))); 
        } else {
            throw new Exception ("Unable to construct FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResponse from provided XML. 
                                  Make sure that ListAllFulfillmentOrdersByNextTokenResponse is a root element");
        }
          
    }
    
    /**
     * Gets the value of the ListAllFulfillmentOrdersByNextTokenResult.
     * 
     * @return ListAllFulfillmentOrdersByNextTokenResult ListAllFulfillmentOrdersByNextTokenResult
     */
    public function getListAllFulfillmentOrdersByNextTokenResult() 
    {
        return $this->_fields['ListAllFulfillmentOrdersByNextTokenResult']['FieldValue'];
    }

    /**
     * Sets the value of the ListAllFulfillmentOrdersByNextTokenResult.
     * 
     * @param ListAllFulfillmentOrdersByNextTokenResult ListAllFulfillmentOrdersByNextTokenResult
     * @return void
     */
    public function setListAllFulfillmentOrdersByNextTokenResult($value) 
    {
        $this->_fields['ListAllFulfillmentOrdersByNextTokenResult']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the ListAllFulfillmentOrdersByNextTokenResult  and returns this instance
     * 
     * @param ListAllFulfillmentOrdersByNextTokenResult $value ListAllFulfillmentOrdersByNextTokenResult
     * @return FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResponse instance
     */
    public function withListAllFulfillmentOrdersByNextTokenResult($value)
    {
        $this->setListAllFulfillmentOrdersByNextTokenResult($value);
        return $this;
    }


    /**
     * Checks if ListAllFulfillmentOrdersByNextTokenResult  is set
     * 
     * @return bool true if ListAllFulfillmentOrdersByNextTokenResult property is set
     */
    public function isSetListAllFulfillmentOrdersByNextTokenResult()
    {
        return !is_null($this->_fields['ListAllFulfillmentOrdersByNextTokenResult']['FieldValue']);

    }

    /**
     * Gets the value of the ResponseMetadata.
     * 
     * @return ResponseMetadata ResponseMetadata
     */
    public function getResponseMetadata() 
    {
        return $this->_fields['ResponseMetadata']['FieldValue'];
    }

    /**
     * Sets the value of the ResponseMetadata.
     * 
     * @param ResponseMetadata ResponseMetadata
     * @return void
     */
    public function setResponseMetadata($value) 
    {
        $this->_fields['ResponseMetadata']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the ResponseMetadata  and returns this instance
     * 
     * @param ResponseMetadata $value ResponseMetadata
     * @return FBAOutboundServiceMWS_Model_ListAllFulfillmentOrdersByNextTokenResponse instance
     */
    public function withResponseMetadata($value)
    {
        $this->setResponseMetadata($value);
        return $this;
    }


    /**
     * Checks if ResponseMetadata  is set
     * 
     * @return bool true if ResponseMetadata property is set
     */
    public function isSetResponseMetadata()
    {
        return !is_null($this->_fields['ResponseMetadata']['FieldValue']);

    }



    /**
     * XML Representation for this object
     * 
     * @return string XML for this object
     */
    public function toXML() 
    {
        $xml = "";
        $xml .= "<ListAllFulfillmentOrdersByNextTokenResponse xmlns=\"http://mws.amazonaws.com/FulfillmentOutboundShipment/2010-10-01/\">";
        $xml .= $this->_toXMLFragment();
        $xml .= "</ListAllFulfillmentOrdersByNextTokenResponse>";
        return $xml;
    }

}