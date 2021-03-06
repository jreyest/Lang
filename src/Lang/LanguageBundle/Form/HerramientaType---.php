<?php

namespace Lang\LanguageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Lang\LanguageBundle\Entity\Herramienta;

class HerramientaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('web2OrSoft', 'choice', array('choices' => Herramienta::getweb2OrSofts(), 'expanded'=>false))
            ->add('freeOrPaid', 'choice', array('choices' => Herramienta::getFreeOrPaids(), 'expanded'=>false))
            ->add('herratipo', 'entity', array('label' => 'Tipo de herramienta', 'class'=>'Lang\LanguageBundle\Entity\Herratipo'))           
            ->add('nombre', 'text', array('label' => 'Nombre'))
            ->add('version', 'text', array('label' => 'Versión'))
            ->add('titDest', 'text',array('label' => 'Título destacado'))
            ->add('descripcion', 'textarea', array('label' => 'Descripción breve'))
            ->add('descripLarga', 'textarea', array('label' => 'Descripción larga'))
            ->add('keywordsEs', 'text', array('label' => 'Keywords'))
            ->add('tamano', 'text', array('label' => 'Tamaño (bytes)'))
            ->add('getIt', 'url', array('label' => 'URL de descarga'))
            ->add('urlAuthor', 'url', array('label' => 'URL del autor'))
            ->add('reqMinEs', 'textarea', array('label' => 'Requisitos mínimos'))
            ->add('seoUrl', 'text', array('label' => 'URL SEO'))
            ->add('oss', 'entity', array('label' => 'Sistema Operativo', 'class'=>'Lang\LanguageBundle\Entity\OS', 'required' => false, 'multiple' => true)) 
            ->add('paises', 'text', array('label' => 'Países en los que está disponible'))
            ->add('edRaiting', 'text', array('label' => 'Valoración', 'required' => false))
            ->add('image1', 'file', array('label' => 'Foto 1', 'required' => false))
            ->add('image2', 'file', array('label' => 'Foto 2', 'required' => false))
            ->add('foto3', 'file', array('label' => 'Foto 3', 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lang\LanguageBundle\Entity\Herramienta'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lang_languagebundle_herramienta';
    }
}
