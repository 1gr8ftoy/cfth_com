<?php

namespace BConway\WebsiteBundle\Document;

class Hours
{
    /**
     * @var BConway\WebsiteBundle\Document\HolidayHours
     */
    protected $holiday;

    /**
     * @var BConway\WebsiteBundle\Document\StandardHours
     */
    protected $standard;


    /**
     * Set holiday
     *
     * @param BConway\WebsiteBundle\Document\HolidayHours $holiday
     * @return self
     */
    public function setHoliday(\BConway\WebsiteBundle\Document\HolidayHours $holiday)
    {
        $this->holiday = $holiday;
        return $this;
    }

    /**
     * Get holiday
     *
     * @return BConway\WebsiteBundle\Document\HolidayHours $holiday
     */
    public function getHoliday()
    {
        return $this->holiday;
    }

    /**
     * Set standard
     *
     * @param BConway\WebsiteBundle\Document\StandardHours $standard
     * @return self
     */
    public function setStandard(\BConway\WebsiteBundle\Document\StandardHours $standard)
    {
        $this->standard = $standard;
        return $this;
    }

    /**
     * Get standard
     *
     * @return BConway\WebsiteBundle\Document\StandardHours $standard
     */
    public function getStandard()
    {
        return $this->standard;
    }
}
