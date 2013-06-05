<?php

namespace Onemedia\MongoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SeedType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', 'text', array(
                'label' => 'Message',
                'required' => true,
            ))
            ->add('save', 'submit', array(
                'label' => 'Save'
            ))
        ;
    }

    public function getName()
    {
        return 'seed_form';
    }
}