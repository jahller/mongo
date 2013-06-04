<?php

namespace Onemedia\MongoBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Onemedia\MongoBundle\Document\Person;

class LoadPersonData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $person = new Person();
        $person->setName('Janosh');
        $person->setAge(85);
        $person->setCountry($this->getReference('Germany'));

        $manager->persist($person);
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}