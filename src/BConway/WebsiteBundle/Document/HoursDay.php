<?php

namespace BConway\WebsiteBundle\Document;

class HoursDay
{

    /**
     * @var BConway\WebsiteBundle\Document\HourSet
     */
    protected $hours = array();

    public function __construct()
    {
        $this->hours = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add hour
     *
     * @param BConway\WebsiteBundle\Document\HourSet $hour
     */
    public function addHour(\BConway\WebsiteBundle\Document\HourSet $hour)
    {
        $this->hours[] = $hour;
    }

    /**
     * Remove hour
     *
     * @param BConway\WebsiteBundle\Document\HourSet $hour
     */
    public function removeHour(\BConway\WebsiteBundle\Document\HourSet $hour)
    {
        $this->hours->removeElement($hour);
    }

    /**
     * Get hours
     *
     * @return Doctrine\Common\Collections\Collection $hours
     */
    public function getHours()
    {
        return $this->hours;
    }
}
