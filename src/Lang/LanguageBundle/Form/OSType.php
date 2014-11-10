<?php

namespace Lang\LanguageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Lang\LanguageBundle\Entity\OS;

class OSType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('osName', null, array('label' => 'Nombre del Sistema Operativo'))
            ->add('osSeo', null, array('label' => 'Nombre para SEO'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lang\LanguageBundle\Entity\OS'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lang_languagebundle_os';
    }
}