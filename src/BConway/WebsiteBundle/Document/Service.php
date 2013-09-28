<?php

namespace BConway\WebsiteBundle\Document;

class Service
{

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $description
     */
    protected $description;

    /**
     * @var BConway\WebsiteBundle\Document\StandardHours
     */
    protected $hours;


    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set hours
     *
     * @param BConway\WebsiteBundle\Document\StandardHours $hours
     * @return self
     */
    public function setHours(\BConway\WebsiteBundle\Document\StandardHours $hours)
    {
        $this->hours = $hours;
        return $this;
    }

    /**
     * Get hours
     *
     * @return BConway\WebsiteBundle\Document\StandardHours $hours
     */
    public function getHours()
    {
        return $this->hours;
    }
}
