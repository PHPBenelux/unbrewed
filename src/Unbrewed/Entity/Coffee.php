<?php

namespace Unbrewed\Entity;

class Coffee
{
    protected $id;

    protected $name;

    protected $location;

    protected $roast;

    protected $granularity;

    /**
     * @return id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $location
     * @return self
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return roast
     */
    public function getRoast()
    {
        return $this->roast;
    }

    /**
     * @param $roast
     * @return self
     */
    public function setRoast($roast)
    {
        $allowedRoasts = array('light', 'dark');
        if (!in_array($roast, $allowedRoasts)) {
            throw \InvalidArgumentException('Invalid roast type. Allowed types are light and dark.');
        }
        $this->roast = $roast;
        return $this;
    }

    /**
     * @return granularity
     */
    public function getGranularity()
    {
        return $this->granularity;
    }

    /**
     * @param $granularity
     * @return self
     */
    public function setGranularity($granularity)
    {
        $allowedGrains = array('fine', 'normal', 'coarse');
        if (!in_array($granularity, $allowedGrains)) {
            throw \InvalidArgumentException('Invalid granularity type. Allowed types are fine, normal, and coarse.');
        }
        $this->granularity = $granularity;
        return $this;
    }
}
