<?php
namespace Lang\LanguageBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Lang\LanguageBundle\Entity\Herramienta;
 
class HerramientaAdmin extends Admin
{
        // setup the defaut sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'fecha_crea'
    );
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('freeOrPaid', 'choice', array('choices' => Herramienta::getFreeOrPaids(), 'expanded' => true))
            ->add('fechaCrea')
            ->add('fechaAct')
            ->add('nombre')
            ->add('version') //if no type is specified, SonataAdminBundle tries to guess it
            ->add('titDest')
            ->add('descripcion')
            ->add('descripLarga')
            ->add('keywordsEs')
            ->add('web2OrSoft')
            ->add('tamano')
            ->add('getIt')       
            ->add('urlAuthor')                
            ->add('reqMinEs')
            ->add('seoUrl')
            ->add('paises')
            ->add('edRaiting')                 
            ->add('foto1')
            ->add('foto2')
            ->add('foto3')                  
                    
                    ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('freeOrPaid')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nombre')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }
        protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('nombre')
        ;
    }
}
?>