<?php

namespace Lang\LanguageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Lang\LanguageBundle\Entity\Idiorec;

class IdiorecType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recurso')
            ->add('idioma')  
            ->add('nivEasy', 'checkbox')                 
            ->add('nivInt', 'checkbox') 
            ->add('nivHard', 'checkbox')                 
            ->add('catGram', 'checkbox')             
            ->add('catComEscr', 'checkbox')             
            ->add('catComAud', 'checkbox') 
            ->add('catPron', 'checkbox') 
            ->add('catExpOra', 'checkbox')                 
            
            ;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'idiorec';
    }
}