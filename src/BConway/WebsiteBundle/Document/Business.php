<?php
namespace BConway\WebsiteBundle\Document;

class Business
{

    /**
     * @var $id
     */
    protected $id;

    /**
     * @var string $ad
     */
    protected $ad;

    /**
     * @var boolean $claimed
     */
    protected $claimed;

    /**
     * @var string $coupons
     */
    protected $coupons;

    /**
     * @var date $dateCreated
     */
    protected $dateCreated;

    /**
     * @var date $dateModified
     */
    protected $dateModified;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $organization
     */
    protected $organization;

    /**
     * @var boolean $permanentlyClosed
     */
    protected $permanentlyClosed;

    /**
     * @var string $phone
     */
    protected $phone;

    /**
     * @var collection $tags
     */
    protected $tags;

    /**
     * @var string $website
     */
    protected $website;

    /**
     * @var BConway\WebsiteBundle\Document\Address
     */
    protected $address;

    /**
     * @var BConway\WebsiteBundle\Document\Service
     */
    protected $hours = array();

    public function __construct()
    {
        $this->hours = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ad
     *
     * @param string $ad
     * @return self
     */
    public function setAd($ad)
    {
        $this->ad = $ad;
        return $this;
    }

    /**
     * Get ad
     *
     * @return string $ad
     */
    public function getAd()
    {
        return $this->ad;
    }

    /**
     * Set address
     *
     * @param BConway\WebsiteBundle\Document\Address $address
     * @return self
     */
    public function setAddress(\BConway\WebsiteBundle\Document\Address $address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Get address
     *
     * @return BConway\WebsiteBundle\Document\Address $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set claimed
     *
     * @param boolean $claimed
     * @return self
     */
    public function setClaimed($claimed)
    {
        $this->claimed = $claimed;
        return $this;
    }

    /**
     * Get claimed
     *
     * @return boolean $claimed
     */
    public function getClaimed()
    {
        return $this->claimed;
    }

    /**
     * Set coupons
     *
     * @param string $coupons
     * @return self
     */
    public function setCoupons($coupons)
    {
        $this->coupons = $coupons;
        return $this;
    }

    /**
     * Get coupons
     *
     * @return string $coupons
     */
    public function getCoupons()
    {
        return $this->coupons;
    }

    /**
     * Set dateCreated
     *
     * @param date $dateCreated
     * @return self
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return date $dateCreated
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateModified
     *
     * @param date $dateModified
     * @return self
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;
        return $this;
    }

    /**
     * Get dateModified
     *
     * @return date $dateModified
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Add hour
     *
     * @param BConway\WebsiteBundle\Document\Service $hour
     */
    public function addHour(\BConway\WebsiteBundle\Document\Service $hour)
    {
        $this->hours[] = $hour;
    }

    /**
     * Remove hour
     *
     * @param BConway\WebsiteBundle\Document\Service $hour
     */
    public function removeHour(\BConway\WebsiteBundle\Document\Service $hour)
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
     * Set organization
     *
     * @param string $organization
     * @return self
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
        return $this;
    }

    /**
     * Get organization
     *
     * @return string $organization
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set permanentlyClosed
     *
     * @param boolean $permanentlyClosed
     * @return self
     */
    public function setPermanentlyClosed($permanentlyClosed)
    {
        $this->permanentlyClosed = $permanentlyClosed;
        return $this;
    }

    /**
     * Get permanentlyClosed
     *
     * @return boolean $permanentlyClosed
     */
    public function getPermanentlyClosed()
    {
        return $this->permanentlyClosed;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set tags
     *
     * @param collection $tags
     * @return self
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * Get tags
     *
     * @return collection $tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return self
     */
    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }

    /**
     * Get website
     *
     * @return string $website
     */
    public function getWebsite()
    {
        return $this->website;
    }
}
