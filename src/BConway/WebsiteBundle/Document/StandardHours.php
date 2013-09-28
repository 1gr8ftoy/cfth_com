<?php

namespace BConway\WebsiteBundle\Document;

class StandardHours
{

    /**
     * @var BConway\WebsiteBundle\Document\HoursDay
     */
    protected $mon;

    /**
     * @var BConway\WebsiteBundle\Document\HoursDay
     */
    protected $tue;

    /**
     * @var BConway\WebsiteBundle\Document\HoursDay
     */
    protected $wed;

    /**
     * @var BConway\WebsiteBundle\Document\HoursDay
     */
    protected $thu;

    /**
     * @var BConway\WebsiteBundle\Document\HoursDay
     */
    protected $fri;

    /**
     * @var BConway\WebsiteBundle\Document\HoursDay
     */
    protected $sat;

    /**
     * @var BConway\WebsiteBundle\Document\HoursDay
     */
    protected $sun;


    /**
     * Set mon
     *
     * @param BConway\WebsiteBundle\Document\HoursDay $mon
     * @return self
     */
    public function setMon(\BConway\WebsiteBundle\Document\HoursDay $mon)
    {
        $this->mon = $mon;
        return $this;
    }

    /**
     * Get mon
     *
     * @return BConway\WebsiteBundle\Document\HoursDay $mon
     */
    public function getMon()
    {
        return $this->mon;
    }

    /**
     * Set tue
     *
     * @param BConway\WebsiteBundle\Document\HoursDay $tue
     * @return self
     */
    public function setTue(\BConway\WebsiteBundle\Document\HoursDay $tue)
    {
        $this->tue = $tue;
        return $this;
    }

    /**
     * Get tue
     *
     * @return BConway\WebsiteBundle\Document\HoursDay $tue
     */
    public function getTue()
    {
        return $this->tue;
    }

    /**
     * Set wed
     *
     * @param BConway\WebsiteBundle\Document\HoursDay $wed
     * @return self
     */
    public function setWed(\BConway\WebsiteBundle\Document\HoursDay $wed)
    {
        $this->wed = $wed;
        return $this;
    }

    /**
     * Get wed
     *
     * @return BConway\WebsiteBundle\Document\HoursDay $wed
     */
    public function getWed()
    {
        return $this->wed;
    }

    /**
     * Set thu
     *
     * @param BConway\WebsiteBundle\Document\HoursDay $thu
     * @return self
     */
    public function setThu(\BConway\WebsiteBundle\Document\HoursDay $thu)
    {
        $this->thu = $thu;
        return $this;
    }

    /**
     * Get thu
     *
     * @return BConway\WebsiteBundle\Document\HoursDay $thu
     */
    public function getThu()
    {
        return $this->thu;
    }

    /**
     * Set fri
     *
     * @param BConway\WebsiteBundle\Document\HoursDay $fri
     * @return self
     */
    public function setFri(\BConway\WebsiteBundle\Document\HoursDay $fri)
    {
        $this->fri = $fri;
        return $this;
    }

    /**
     * Get fri
     *
     * @return BConway\WebsiteBundle\Document\HoursDay $fri
     */
    public function getFri()
    {
        return $this->fri;
    }

    /**
     * Set sat
     *
     * @param BConway\WebsiteBundle\Document\HoursDay $sat
     * @return self
     */
    public function setSat(\BConway\WebsiteBundle\Document\HoursDay $sat)
    {
        $this->sat = $sat;
        return $this;
    }

    /**
     * Get sat
     *
     * @return BConway\WebsiteBundle\Document\HoursDay $sat
     */
    public function getSat()
    {
        return $this->sat;
    }

    /**
     * Set sun
     *
     * @param BConway\WebsiteBundle\Document\HoursDay $sun
     * @return self
     */
    public function setSun(\BConway\WebsiteBundle\Document\HoursDay $sun)
    {
        $this->sun = $sun;
        return $this;
    }

    /**
     * Get sun
     *
     * @return BConway\WebsiteBundle\Document\HoursDay $sun
     */
    public function getSun()
    {
        return $this->sun;
    }
}
