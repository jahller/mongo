<?php

namespace Onemedia\MongoBundle\Controller;

use Onemedia\MongoBundle\Form\SeedType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Doctrine\ODM\MongoDB\DocumentManager;

use Onemedia\MongoBundle\Document\Person;
use Onemedia\MongoBundle\Form\ConfigurationType;

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
     * @Route("/show", name="default_show")
     * @Method({"get"})
     */
    public function showAction()
    {
        $repository = $this->get('doctrine_mongodb')
            ->getManager()
            ->getRepository('OnemediaMongoBundle:Person');
        $persons = $repository->findAll();

        if (!$persons) {
            throw $this->createNotFoundException('No persons found');
        }

        return $this->render('OnemediaMongoBundle:Default:show.html.twig', array(
            'persons' => $persons
        ));
    }

    /**
     * @Route("/configuration", name="configuration")
     * @Method({"post", "get"})
     */
    public function configurationAction(Request $request)
    {
        $form = $this->createForm(new ConfigurationType());

        $form->handleRequest($request);
        if ($form->isValid()) {
            echo 'Success';
        }

        return $this->render('OnemediaMongoBundle:Default:configuration.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
