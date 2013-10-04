<?php

namespace BConway\WebsiteBundle\Document;

class HourSet
{

    /**
     * @var string $open
     */
    protected $open;

    /**
     * @var string $close
     */
    protected $close;

    public function __construct($open = null, $close = null)
    {
        if (!is_null($open) && !is_null($close)) {
            $this->setOpen($open);
            $this->setClose($close);
        }
    }


    /**
     * Set open
     *
     * @param string $open
     * @return self
     */
    public function setOpen($open)
    {
        $this->open = $open;
        return $this;
    }

    /**
     * Get open
     *
     * @return string $open
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * Set close
     *
     * @param string $close
     * @return self
     */
    public function setClose($close)
    {
        $this->close = $close;
        return $this;
    }

    /**
     * Get close
     *
     * @return string $close
     */
    public function getClose()
    {
        return $this->close;
    }
}
