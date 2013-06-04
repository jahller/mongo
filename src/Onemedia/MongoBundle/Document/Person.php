<?php

namespace Onemedia\MongoBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

use Onemedia\MongoBundle\Document\Country;

/**
 * Class Person
 * @package Onemedia\MongoBundle\Document
 *
 * @MongoDB\Document
 */
class Person
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\Int
     */
    protected $age;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Country", cascade="remove")
     */
    protected $country;

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setCountry(Country $country = null)
    {
        $this->country = $country;
    }

    public function getCountry()
    {
        return $this->country;
    }

}
