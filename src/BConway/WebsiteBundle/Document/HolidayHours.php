<?php

namespace BConway\WebsiteBundle\Document;

class HolidayHours
{

    /**
     * @var string $newYears
     */
    protected $newYears;

    /**
     * @var string $easter
     */
    protected $easter;

    /**
     * @var string $memorialDay
     */
    protected $memorialDay;

    /**
     * @var string $independenceDay
     */
    protected $independenceDay;

    /**
     * @var string $laborDay
     */
    protected $laborDay;

    /**
     * @var string $thanksgiving
     */
    protected $thanksgiving;

    /**
     * @var string $dayAfterThanksgiving
     */
    protected $dayAfterThanksgiving;

    /**
     * @var string $christmasEve
     */
    protected $christmasEve;

    /**
     * @var string $christmas
     */
    protected $christmas;

    /**
     * @var string $newYearsEve
     */
    protected $newYearsEve;


    /**
     * Set newYears
     *
     * @param string $newYears
     * @return self
     */
    public function setNewYears($newYears)
    {
        $this->newYears = $newYears;
        return $this;
    }

    /**
     * Get newYears
     *
     * @return string $newYears
     */
    public function getNewYears()
    {
        return $this->newYears;
    }

    /**
     * Set easter
     *
     * @param string $easter
     * @return self
     */
    public function setEaster($easter)
    {
        $this->easter = $easter;
        return $this;
    }

    /**
     * Get easter
     *
     * @return string $easter
     */
    public function getEaster()
    {
        return $this->easter;
    }

    /**
     * Set memorialDay
     *
     * @param string $memorialDay
     * @return self
     */
    public function setMemorialDay($memorialDay)
    {
        $this->memorialDay = $memorialDay;
        return $this;
    }

    /**
     * Get memorialDay
     *
     * @return string $memorialDay
     */
    public function getMemorialDay()
    {
        return $this->memorialDay;
    }

    /**
     * Set independenceDay
     *
     * @param string $independenceDay
     * @return self
     */
    public function setIndependenceDay($independenceDay)
    {
        $this->independenceDay = $independenceDay;
        return $this;
    }

    /**
     * Get independenceDay
     *
     * @return string $independenceDay
     */
    public function getIndependenceDay()
    {
        return $this->independenceDay;
    }

    /**
     * Set laborDay
     *
     * @param string $laborDay
     * @return self
     */
    public function setLaborDay($laborDay)
    {
        $this->laborDay = $laborDay;
        return $this;
    }

    /**
     * Get laborDay
     *
     * @return string $laborDay
     */
    public function getLaborDay()
    {
        return $this->laborDay;
    }

    /**
     * Set thanksgiving
     *
     * @param string $thanksgiving
     * @return self
     */
    public function setThanksgiving($thanksgiving)
    {
        $this->thanksgiving = $thanksgiving;
        return $this;
    }

    /**
     * Get thanksgiving
     *
     * @return string $thanksgiving
     */
    public function getThanksgiving()
    {
        return $this->thanksgiving;
    }

    /**
     * Set dayAfterThanksgiving
     *
     * @param string $dayAfterThanksgiving
     * @return self
     */
    public function setDayAfterThanksgiving($dayAfterThanksgiving)
    {
        $this->dayAfterThanksgiving = $dayAfterThanksgiving;
        return $this;
    }

    /**
     * Get dayAfterThanksgiving
     *
     * @return string $dayAfterThanksgiving
     */
    public function getDayAfterThanksgiving()
    {
        return $this->dayAfterThanksgiving;
    }

    /**
     * Set christmasEve
     *
     * @param string $christmasEve
     * @return self
     */
    public function setChristmasEve($christmasEve)
    {
        $this->christmasEve = $christmasEve;
        return $this;
    }

    /**
     * Get christmasEve
     *
     * @return string $christmasEve
     */
    public function getChristmasEve()
    {
        return $this->christmasEve;
    }

    /**
     * Set christmas
     *
     * @param string $christmas
     * @return self
     */
    public function setChristmas($christmas)
    {
        $this->christmas = $christmas;
        return $this;
    }

    /**
     * Get christmas
     *
     * @return string $christmas
     */
    public function getChristmas()
    {
        return $this->christmas;
    }

    /**
     * Set newYearsEve
     *
     * @param string $newYearsEve
     * @return self
     */
    public function setNewYearsEve($newYearsEve)
    {
        $this->newYearsEve = $newYearsEve;
        return $this;
    }

    /**
     * Get newYearsEve
     *
     * @return string $newYearsEve
     */
    public function getNewYearsEve()
    {
        return $this->newYearsEve;
    }
}
