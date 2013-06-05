<?php

namespace Onemedia\MongoBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Seed
 * @package Onemedia\MongoBundle\Document
 *
 * @MongoDB\Document
 */
class Seed
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     * @Assert\NotBlank()
     * @Assert\MaxLength(limit=255)
     */
    protected $message;

    /**
     * @MongoDB\String
     */
    protected $configuration;

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
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $configuration
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    public function __toString()
    {
        return $this->getMessage();
    }
}
