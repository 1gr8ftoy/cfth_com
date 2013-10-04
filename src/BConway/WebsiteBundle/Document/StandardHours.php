<?php

namespace BConway\WebsiteBundle\Document;

class StandardHours
{    /**
     * @var BConway\WebsiteBundle\Document\HourSet
     */
    protected $mon = array();

    /**
     * @var BConway\WebsiteBundle\Document\HourSet
     */
    protected $tue = array();

    /**
     * @var BConway\WebsiteBundle\Document\HourSet
     */
    protected $wed = array();

    /**
     * @var BConway\WebsiteBundle\Document\HourSet
     */
    protected $thu = array();

    /**
     * @var BConway\WebsiteBundle\Document\HourSet
     */
    protected $fri = array();

    /**
     * @var BConway\WebsiteBundle\Document\HourSet
     */
    protected $sat = array();

    /**
     * @var BConway\WebsiteBundle\Document\HourSet
     */
    protected $sun = array();

    public function __construct()
    {
        $this->mon = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tue = new \Doctrine\Common\Collections\ArrayCollection();
        $this->wed = new \Doctrine\Common\Collections\ArrayCollection();
        $this->thu = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fri = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sat = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sun = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add mon
     *
     * @param BConway\WebsiteBundle\Document\HourSet $mon
     */
    public function addMon(\BConway\WebsiteBundle\Document\HourSet $mon)
    {
        $this->mon[] = $mon;
    }

    /**
     * Remove mon
     *
     * @param BConway\WebsiteBundle\Document\HourSet $mon
     */
    public function removeMon(\BConway\WebsiteBundle\Document\HourSet $mon)
    {
        $this->mon->removeElement($mon);
    }

    /**
     * Get mon
     *
     * @return Doctrine\Common\Collections\Collection $mon
     */
    public function getMon()
    {
        return $this->mon;
    }

    /**
     * Add tue
     *
     * @param BConway\WebsiteBundle\Document\HourSet $tue
     */
    public function addTue(\BConway\WebsiteBundle\Document\HourSet $tue)
    {
        $this->tue[] = $tue;
    }

    /**
     * Remove tue
     *
     * @param BConway\WebsiteBundle\Document\HourSet $tue
     */
    public function removeTue(\BConway\WebsiteBundle\Document\HourSet $tue)
    {
        $this->tue->removeElement($tue);
    }

    /**
     * Get tue
     *
     * @return Doctrine\Common\Collections\Collection $tue
     */
    public function getTue()
    {
        return $this->tue;
    }

    /**
     * Add wed
     *
     * @param BConway\WebsiteBundle\Document\HourSet $wed
     */
    public function addWed(\BConway\WebsiteBundle\Document\HourSet $wed)
    {
        $this->wed[] = $wed;
    }

    /**
     * Remove wed
     *
     * @param BConway\WebsiteBundle\Document\HourSet $wed
     */
    public function removeWed(\BConway\WebsiteBundle\Document\HourSet $wed)
    {
        $this->wed->removeElement($wed);
    }

    /**
     * Get wed
     *
     * @return Doctrine\Common\Collections\Collection $wed
     */
    public function getWed()
    {
        return $this->wed;
    }

    /**
     * Add thu
     *
     * @param BConway\WebsiteBundle\Document\HourSet $thu
     */
    public function addThu(\BConway\WebsiteBundle\Document\HourSet $thu)
    {
        $this->thu[] = $thu;
    }

    /**
     * Remove thu
     *
     * @param BConway\WebsiteBundle\Document\HourSet $thu
     */
    public function removeThu(\BConway\WebsiteBundle\Document\HourSet $thu)
    {
        $this->thu->removeElement($thu);
    }

    /**
     * Get thu
     *
     * @return Doctrine\Common\Collections\Collection $thu
     */
    public function getThu()
    {
        return $this->thu;
    }

    /**
     * Add fri
     *
     * @param BConway\WebsiteBundle\Document\HourSet $fri
     */
    public function addFri(\BConway\WebsiteBundle\Document\HourSet $fri)
    {
        $this->fri[] = $fri;
    }

    /**
     * Remove fri
     *
     * @param BConway\WebsiteBundle\Document\HourSet $fri
     */
    public function removeFri(\BConway\WebsiteBundle\Document\HourSet $fri)
    {
        $this->fri->removeElement($fri);
    }

    /**
     * Get fri
     *
     * @return Doctrine\Common\Collections\Collection $fri
     */
    public function getFri()
    {
        return $this->fri;
    }

    /**
     * Add sat
     *
     * @param BConway\WebsiteBundle\Document\HourSet $sat
     */
    public function addSat(\BConway\WebsiteBundle\Document\HourSet $sat)
    {
        $this->sat[] = $sat;
    }

    /**
     * Remove sat
     *
     * @param BConway\WebsiteBundle\Document\HourSet $sat
     */
    public function removeSat(\BConway\WebsiteBundle\Document\HourSet $sat)
    {
        $this->sat->removeElement($sat);
    }

    /**
     * Get sat
     *
     * @return Doctrine\Common\Collections\Collection $sat
     */
    public function getSat()
    {
        return $this->sat;
    }

    /**
     * Add sun
     *
     * @param BConway\WebsiteBundle\Document\HourSet $sun
     */
    public function addSun(\BConway\WebsiteBundle\Document\HourSet $sun)
    {
        $this->sun[] = $sun;
    }

    /**
     * Remove sun
     *
     * @param BConway\WebsiteBundle\Document\HourSet $sun
     */
    public function removeSun(\BConway\WebsiteBundle\Document\HourSet $sun)
    {
        $this->sun->removeElement($sun);
    }

    /**
     * Get sun
     *
     * @return Doctrine\Common\Collections\Collection $sun
     */
    public function getSun()
    {
        return $this->sun;
    }
}
