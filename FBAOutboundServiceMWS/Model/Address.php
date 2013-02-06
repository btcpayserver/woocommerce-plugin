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
 * FBAOutboundServiceMWS_Model_Address
 * 
 * Properties:
 * <ul>
 * 
 * <li>Name: string</li>
 * <li>Line1: string</li>
 * <li>Line2: string</li>
 * <li>Line3: string</li>
 * <li>DistrictOrCounty: string</li>
 * <li>City: string</li>
 * <li>StateOrProvinceCode: string</li>
 * <li>CountryCode: string</li>
 * <li>PostalCode: string</li>
 * <li>PhoneNumber: string</li>
 *
 * </ul>
 */ 
class FBAOutboundServiceMWS_Model_Address extends FBAOutboundServiceMWS_Model
{


    /**
     * Construct new FBAOutboundServiceMWS_Model_Address
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>Name: string</li>
     * <li>Line1: string</li>
     * <li>Line2: string</li>
     * <li>Line3: string</li>
     * <li>DistrictOrCounty: string</li>
     * <li>City: string</li>
     * <li>StateOrProvinceCode: string</li>
     * <li>CountryCode: string</li>
     * <li>PostalCode: string</li>
     * <li>PhoneNumber: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'Name' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Line1' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Line2' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Line3' => array('FieldValue' => null, 'FieldType' => 'string'),
        'DistrictOrCounty' => array('FieldValue' => null, 'FieldType' => 'string'),
        'City' => array('FieldValue' => null, 'FieldType' => 'string'),
        'StateOrProvinceCode' => array('FieldValue' => null, 'FieldType' => 'string'),
        'CountryCode' => array('FieldValue' => null, 'FieldType' => 'string'),
        'PostalCode' => array('FieldValue' => null, 'FieldType' => 'string'),
        'PhoneNumber' => array('FieldValue' => null, 'FieldType' => 'string'),
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
     * @return FBAOutboundServiceMWS_Model_Address instance
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
     * Gets the value of the Line1 property.
     * 
     * @return string Line1
     */
    public function getLine1() 
    {
        return $this->_fields['Line1']['FieldValue'];
    }

    /**
     * Sets the value of the Line1 property.
     * 
     * @param string Line1
     * @return this instance
     */
    public function setLine1($value) 
    {
        $this->_fields['Line1']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Line1 and returns this instance
     * 
     * @param string $value Line1
     * @return FBAOutboundServiceMWS_Model_Address instance
     */
    public function withLine1($value)
    {
        $this->setLine1($value);
        return $this;
    }


    /**
     * Checks if Line1 is set
     * 
     * @return bool true if Line1  is set
     */
    public function isSetLine1()
    {
        return !is_null($this->_fields['Line1']['FieldValue']);
    }

    /**
     * Gets the value of the Line2 property.
     * 
     * @return string Line2
     */
    public function getLine2() 
    {
        return $this->_fields['Line2']['FieldValue'];
    }

    /**
     * Sets the value of the Line2 property.
     * 
     * @param string Line2
     * @return this instance
     */
    public function setLine2($value) 
    {
        $this->_fields['Line2']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Line2 and returns this instance
     * 
     * @param string $value Line2
     * @return FBAOutboundServiceMWS_Model_Address instance
     */
    public function withLine2($value)
    {
        $this->setLine2($value);
        return $this;
    }


    /**
     * Checks if Line2 is set
     * 
     * @return bool true if Line2  is set
     */
    public function isSetLine2()
    {
        return !is_null($this->_fields['Line2']['FieldValue']);
    }

    /**
     * Gets the value of the Line3 property.
     * 
     * @return string Line3
     */
    public function getLine3() 
    {
        return $this->_fields['Line3']['FieldValue'];
    }

    /**
     * Sets the value of the Line3 property.
     * 
     * @param string Line3
     * @return this instance
     */
    public function setLine3($value) 
    {
        $this->_fields['Line3']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Line3 and returns this instance
     * 
     * @param string $value Line3
     * @return FBAOutboundServiceMWS_Model_Address instance
     */
    public function withLine3($value)
    {
        $this->setLine3($value);
        return $this;
    }


    /**
     * Checks if Line3 is set
     * 
     * @return bool true if Line3  is set
     */
    public function isSetLine3()
    {
        return !is_null($this->_fields['Line3']['FieldValue']);
    }

    /**
     * Gets the value of the DistrictOrCounty property.
     * 
     * @return string DistrictOrCounty
     */
    public function getDistrictOrCounty() 
    {
        return $this->_fields['DistrictOrCounty']['FieldValue'];
    }

    /**
     * Sets the value of the DistrictOrCounty property.
     * 
     * @param string DistrictOrCounty
     * @return this instance
     */
    public function setDistrictOrCounty($value) 
    {
        $this->_fields['DistrictOrCounty']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the DistrictOrCounty and returns this instance
     * 
     * @param string $value DistrictOrCounty
     * @return FBAOutboundServiceMWS_Model_Address instance
     */
    public function withDistrictOrCounty($value)
    {
        $this->setDistrictOrCounty($value);
        return $this;
    }


    /**
     * Checks if DistrictOrCounty is set
     * 
     * @return bool true if DistrictOrCounty  is set
     */
    public function isSetDistrictOrCounty()
    {
        return !is_null($this->_fields['DistrictOrCounty']['FieldValue']);
    }

    /**
     * Gets the value of the City property.
     * 
     * @return string City
     */
    public function getCity() 
    {
        return $this->_fields['City']['FieldValue'];
    }

    /**
     * Sets the value of the City property.
     * 
     * @param string City
     * @return this instance
     */
    public function setCity($value) 
    {
        $this->_fields['City']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the City and returns this instance
     * 
     * @param string $value City
     * @return FBAOutboundServiceMWS_Model_Address instance
     */
    public function withCity($value)
    {
        $this->setCity($value);
        return $this;
    }


    /**
     * Checks if City is set
     * 
     * @return bool true if City  is set
     */
    public function isSetCity()
    {
        return !is_null($this->_fields['City']['FieldValue']);
    }

    /**
     * Gets the value of the StateOrProvinceCode property.
     * 
     * @return string StateOrProvinceCode
     */
    public function getStateOrProvinceCode() 
    {
        return $this->_fields['StateOrProvinceCode']['FieldValue'];
    }

    /**
     * Sets the value of the StateOrProvinceCode property.
     * 
     * @param string StateOrProvinceCode
     * @return this instance
     */
    public function setStateOrProvinceCode($value) 
    {
        $this->_fields['StateOrProvinceCode']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the StateOrProvinceCode and returns this instance
     * 
     * @param string $value StateOrProvinceCode
     * @return FBAOutboundServiceMWS_Model_Address instance
     */
    public function withStateOrProvinceCode($value)
    {
        $this->setStateOrProvinceCode($value);
        return $this;
    }


    /**
     * Checks if StateOrProvinceCode is set
     * 
     * @return bool true if StateOrProvinceCode  is set
     */
    public function isSetStateOrProvinceCode()
    {
        return !is_null($this->_fields['StateOrProvinceCode']['FieldValue']);
    }

    /**
     * Gets the value of the CountryCode property.
     * 
     * @return string CountryCode
     */
    public function getCountryCode() 
    {
        return $this->_fields['CountryCode']['FieldValue'];
    }

    /**
     * Sets the value of the CountryCode property.
     * 
     * @param string CountryCode
     * @return this instance
     */
    public function setCountryCode($value) 
    {
        $this->_fields['CountryCode']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the CountryCode and returns this instance
     * 
     * @param string $value CountryCode
     * @return FBAOutboundServiceMWS_Model_Address instance
     */
    public function withCountryCode($value)
    {
        $this->setCountryCode($value);
        return $this;
    }


    /**
     * Checks if CountryCode is set
     * 
     * @return bool true if CountryCode  is set
     */
    public function isSetCountryCode()
    {
        return !is_null($this->_fields['CountryCode']['FieldValue']);
    }

    /**
     * Gets the value of the PostalCode property.
     * 
     * @return string PostalCode
     */
    public function getPostalCode() 
    {
        return $this->_fields['PostalCode']['FieldValue'];
    }

    /**
     * Sets the value of the PostalCode property.
     * 
     * @param string PostalCode
     * @return this instance
     */
    public function setPostalCode($value) 
    {
        $this->_fields['PostalCode']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the PostalCode and returns this instance
     * 
     * @param string $value PostalCode
     * @return FBAOutboundServiceMWS_Model_Address instance
     */
    public function withPostalCode($value)
    {
        $this->setPostalCode($value);
        return $this;
    }


    /**
     * Checks if PostalCode is set
     * 
     * @return bool true if PostalCode  is set
     */
    public function isSetPostalCode()
    {
        return !is_null($this->_fields['PostalCode']['FieldValue']);
    }

    /**
     * Gets the value of the PhoneNumber property.
     * 
     * @return string PhoneNumber
     */
    public function getPhoneNumber() 
    {
        return $this->_fields['PhoneNumber']['FieldValue'];
    }

    /**
     * Sets the value of the PhoneNumber property.
     * 
     * @param string PhoneNumber
     * @return this instance
     */
    public function setPhoneNumber($value) 
    {
        $this->_fields['PhoneNumber']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the PhoneNumber and returns this instance
     * 
     * @param string $value PhoneNumber
     * @return FBAOutboundServiceMWS_Model_Address instance
     */
    public function withPhoneNumber($value)
    {
        $this->setPhoneNumber($value);
        return $this;
    }


    /**
     * Checks if PhoneNumber is set
     * 
     * @return bool true if PhoneNumber  is set
     */
    public function isSetPhoneNumber()
    {
        return !is_null($this->_fields['PhoneNumber']['FieldValue']);
    }




}