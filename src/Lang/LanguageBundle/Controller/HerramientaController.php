<?php

namespace Lang\LanguageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Lang\LanguageBundle\Entity\Herramienta;
use Lang\LanguageBundle\Form\HerramientaType;
use Lang\LanguageBundle\Form\HerramientaActType;
use Symfony\Component\Form\Form;

/**
 * Herramienta controller.
 *
 * @Route("/herramienta")
 */
class HerramientaController extends Controller
{

    /**
     * Lists all Herramienta entities.
     *
     * @Route("/", name="herramienta")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LangLanguageBundle:Herramienta')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Herramienta entity.
     *
     * @Route("/", name="lang_language_anadir_herramienta")
     * @Method("POST")
     * @Template("LangLanguageBundle:Herramienta:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Herramienta();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);


       if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        
             return $this->redirect($this->generateUrl('herramienta_show', array('id' => $entity->getId())));
        }

        return $this->render('LangLanguageBundle:Herramienta:anadirHerra.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Herramienta entity.
     *
     * @param Herramienta $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Herramienta $entity)
    {
        $form = $this->createForm(new HerramientaType(), $entity, array(
            'action' => $this->generateUrl('lang_language_anadir_herramienta'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Herramienta entity.
     *
     * @Route("/new", name="herramienta_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Herramienta();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Herramienta entity.
     *
     * @Route("/{id}", name="herramienta_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LangLanguageBundle:Herramienta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Herramienta entity.');
        }
        
        $VWeb2OrSoft = $entity->getweb2OrSoft();
        $VFreeorpaid = $entity->getFreeorpaid();
        $VHerraTipo = $entity->getHerratipo();
        
        $g = $entity->getweb2OrSofts();
        $web2orsoft = $g[$VWeb2OrSoft];
        
        $g = $entity->getFreeOrPaids();
        $freeorpaid = $g[$VFreeorpaid];        
        //$ruta = $this->get('kernel')->getRootDir();
        //print $ruta;
        
        $deleteForm = $this->createDeleteForm($id);
        

        return array(
            'entity'      => $entity,
            'freeOrPaid'=> $freeorpaid,
            'web2OrSoft'=> $web2orsoft,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Herramienta entity.
     * Accion que se llama al abrirse una URL de edicion de herramienta
     * @Route("/{id}/edit", name="herramienta_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LangLanguageBundle:Herramienta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Herramienta entity.');
            
        }

        $form = $this->createEditForm($entity);
        return $this->render('LangLanguageBundle:Herramienta:edit.html.twig', array(
            'entity' => $entity,
            'id'        => $id,
            'edit_form'   => $form->createView(),
        ));
        //return array(
        //    'entity'      => $entity,
        //    'edit_form'   => $form->createView(),
        //);
    }

    /**
    * Creates a form to edit a Herramienta entity.
    *
    * @param Herramienta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Herramienta $entity)
    {
        $form = $this->createForm(new HerramientaActType(), $entity, array(
            'action' => $this->generateUrl('herramienta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        

        return $form;
    }
    /**
     * Edits an existing Herramienta entity.
     *
     * @Route("/{id}", name="herramienta_update")
     * @Method("PUT")
     * @Template("LangLanguageBundle:Herramienta:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {   
        $params = $this->getRequest()->request->all();
        var_dump($params);
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LangLanguageBundle:Herramienta')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Herramienta entity.');
        }
        $update_form = $this->createEditForm($entity);
        $update_form->bind($request);
        $validator = $this->get('validator');
        $errors = $validator->validate($entity, array('actualizar'));
        
        if (count($errors) === 0) 
            {
            $em->flush();
            $session = $request->getSession();
            $session->getFlashBag()->add('notice', 'Datos modificados');
            return $this->redirect($this->generateUrl('herramienta_edit', array('id' => $id)));
            }
        //if ($update_form->isValid()) {           
        //    $em->flush();
        //    $session = $request->getSession();
        //    $session->getFlashBag()->add('notice', 'Datos modificados');
        //    return $this->redirect($this->generateUrl('herramienta_edit', array('id' => $id)));
        //}
        //else{
        $prueba = $update_form->getData();
        var_dump($prueba);
        //}
        $formErrors = $this->getFormErrors($update_form);
        var_dump ($formErrors);
        //echo "no funca";
            return $this->render('LangLanguageBundle:Herramienta:update.html.twig', array(
            'entity' => $entity,
                'id' => $id,
            'edit_form'   => $update_form->createView(),
        ));
    }
    public function getFormErrors($form)
    {
        $errors = array();

        if ($form instanceof Form) {
            foreach ($form->getErrors() as $error) {
                $errors[] = $error->getMessage();
            }

            foreach ($form->all() as $key => $child) {
                /** @var $child Form */
                if ($err = $this->getFormErrors($child)) {
                    $errors[$key] = $err;
                }
            }
        }

        return $errors;
    }
    /**
     * Deletes a Herramienta entity.
     *
     * @Route("/{id}", name="herramienta_delete")
     * @Method("DELETE")
     */  
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LangLanguageBundle:Herramienta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Herramienta entity.');
            }
            //$em->remove($entity);
            //$em->flush();
            
            
            
            $conn = $this->getDoctrine()->getManager()->getConnection();
            $stmt = $conn->prepare("DELETE FROM herramienta WHERE id = :herra_id");
            $stmt->bindParam('herra_id', $id); 
            $stmt->execute();
            $stmt = $conn->prepare("DELETE FROM os_herramienta WHERE herramienta_id = :herra_id");
            $stmt->bindParam('herra_id', $id); // BEWARE: this array has to have at least one element
            $stmt->execute();
        }

        return $this->redirect($this->generateUrl('herramienta'));
    }

    /**
     * Creates a form to delete a Herramienta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('herramienta_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
