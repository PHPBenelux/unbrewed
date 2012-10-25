<?php

namespace Unbrewed\Entity;

/**
 * Represents a type of coffee
 */
class Coffee
{
    protected $id;

    protected $name;

    protected $location;

    protected $roast;

    protected $granularity;

    /**
     * @return integer id
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
     * @return string name
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
     * @return string location
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
     * @return string roast
     */
    public function getRoast()
    {
        return $this->roast;
    }

    /**
     * @param $roast
     * @return self
     * @throws \InvalidArgumentException
     */
    public function setRoast($roast)
    {
        $allowedRoasts = array('light', 'dark');
        if (!in_array($roast, $allowedRoasts)) {
            throw new \InvalidArgumentException('Invalid roast type. Allowed types are light and dark.');
        }
        $this->roast = $roast;
        return $this;
    }

    /**
     * @return string granularity
     */
    public function getGranularity()
    {
        return $this->granularity;
    }

    /**
     * @param $granularity
     * @return self
     * @throws \InvalidArgumentException
     */
    public function setGranularity($granularity)
    {
        $allowedGrains = array('fine', 'normal', 'coarse');
        if (!in_array($granularity, $allowedGrains)) {
            throw new \InvalidArgumentException('Invalid granularity type. Allowed types are fine, normal, and coarse.');
        }
        $this->granularity = $granularity;
        return $this;
    }
}
