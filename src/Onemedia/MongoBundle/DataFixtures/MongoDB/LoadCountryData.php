<?php

namespace Onemedia\MongoBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Onemedia\MongoBundle\Document\Country;

class LoadCountryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $countryGermany = new Country();
        $countryGermany->setName('Germany');
        $this->addReference('Germany', $countryGermany);
        $manager->persist($countryGermany);

        $countryFrance = new Country();
        $countryFrance->setName('France');
        $this->addReference('France', $countryFrance);
        $manager->persist($countryFrance);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}