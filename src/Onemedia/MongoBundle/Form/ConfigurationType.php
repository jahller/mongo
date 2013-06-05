<?php

namespace Onemedia\MongoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'checkbox', array(
                'label' => 'Title',
                'required' => false,
            ))
            ->add('date', 'checkbox', array(
                'label' => 'Date',
                'required' => false,
            ))
            ->add('save', 'submit', array(
                'label' => 'Save'
            ))
        ;
    }

    public function getName()
    {
        return 'configuration_form';
    }
}