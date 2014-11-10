<?php

namespace Lang\LanguageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Lang\LanguageBundle\Entity\Herratipo;

class HerratipoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipoNom', null, array('label' => 'Nombre'))
            ->add('tipoSeo', null, array('label' => 'Nombre para SEO'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lang\LanguageBundle\Entity\Herratipo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lang_languagebundle_herratipo';
    }
}