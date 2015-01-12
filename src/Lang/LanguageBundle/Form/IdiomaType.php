<?php

namespace Lang\LanguageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Lang\LanguageBundle\Entity\Idioma;

class IdiomaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idiomaName', null, array('label' => 'Nombre del idioma'))
            ->add('idiomaSeo', null, array('label' => 'Nombre para SEO'))
            ->add('submit','submit', array('label' => 'Proceder'))                
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lang\LanguageBundle\Entity\Idioma'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'idioma';
    }
}