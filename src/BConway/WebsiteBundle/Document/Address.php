<?php

namespace BConway\WebsiteBundle\Document;



/**
 * BConway\WebsiteBundle\Document\Address
 */
class Address
{
    /**
     * @var string $city
     */
    protected $city;

    /**
     * @var string $state
     */
    protected $state;

    /**
     * @var string $streetAddress
     */
    protected $streetAddress;

    /**
     * @var string $unit
     */
    protected $unit;

    /**
     * @var string $zip
     */
    protected $zip;

    /**
     * @var BConway\WebsiteBundle\Document\GeoLocation
     */
    protected $geolocation;


    /**
     * Set city
     *
     * @param string $city
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set geolocation
     *
     * @param BConway\WebsiteBundle\Document\GeoLocation $geolocation
     * @return self
     */
    public function setGeolocation(\BConway\WebsiteBundle\Document\GeoLocation $geolocation)
    {
        $this->geolocation = $geolocation;
        return $this;
    }

    /**
     * Get geolocation
     *
     * @return BConway\WebsiteBundle\Document\GeoLocation $geolocation
     */
    public function getGeolocation()
    {
        return $this->geolocation;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * Get state
     *
     * @return string $state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set streetAddress
     *
     * @param string $streetAddress
     * @return self
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
        return $this;
    }

    /**
     * Get streetAddress
     *
     * @return string $streetAddress
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * Set unit
     *
     * @param string $unit
     * @return self
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * Get unit
     *
     * @return string $unit
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return self
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * Get zip
     *
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }
}
