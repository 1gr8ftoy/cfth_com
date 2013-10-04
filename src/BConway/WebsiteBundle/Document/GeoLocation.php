<?php

namespace BConway\WebsiteBundle\Document;



/**
 * BConway\WebsiteBundle\Document\GeoLocation
 */
class GeoLocation
{
    /**
     * @var string $lat
     */
    protected $lat;

    /**
     * @var string $long
     */
    protected $long;


    /**
     * Set lat
     *
     * @param string $lat
     * @return self
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * Get lat
     *
     * @return string $lat
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set long
     *
     * @param string $long
     * @return self
     */
    public function setLong($long)
    {
        $this->long = $long;
        return $this;
    }

    /**
     * Get long
     *
     * @return string $long
     */
    public function getLong()
    {
        return $this->long;
    }
}
