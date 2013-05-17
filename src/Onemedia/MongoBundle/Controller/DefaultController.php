<?php

namespace Onemedia\MongoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Doctrine\ODM\MongoDB\DocumentManager;

use Onemedia\MongoBundle\Document\Person;

/**
 * @Route("/default")
 */
class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OnemediaMongoBundle:Default:index.html.twig', array('name' => $name));
    }

    /**
     * @Route("/create", name="default_create")
     * @Method({"get", "post"})
     */
    public function createAction()
    {
        $person = new Person();
        $person->setName('Jan')
            ->setAge(27)
        ;

        /** @var DocumentManager $documentManager */
        $documentManager = $this->get('doctrine_mongodb')->getManager();
        $documentManager->persist($person);
        $documentManager->flush();

        return new Response('Created person id '.$person->getId());
    }

    /**
     * @Route("/show/{id}", name="default_show")
     * @Method({"get"})
     */
    public function showAction($id)
    {
        $repository = $this->get('doctrine_mongodb')->getManager()->getRepository('OnemediaMongoBundle:Person');
        $person = $repository->find($id);

        if (!$person) {
            throw $this->createNotFoundException('No persons called '.$person->getName());
        }

        return $this->render('OnemediaMongoBundle:Default:show.html.twig', array(
            'person' => $person
        ));
    }
}
