<?php

namespace Lang\LanguageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Lang\LanguageBundle\Entity\Recurso;
use Lang\LanguageBundle\Form\RecursoType;
use Lang\LanguageBundle\Form\RecursoActType;
use Symfony\Component\Form\Form;

/**
 * Recurso controller.
 *
 * @Route("/recurso")
 */
class RecursoController extends Controller
{

    /**
     * Lists all Recurso entities.
     *
     * @Route("/", name="recurso")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LangLanguageBundle:Recurso')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Recurso entity.
     *
     * @Route("/", name="recurso_anadir")
     * @Method("POST")
     * @Template("LangLanguageBundle:Recurso:anadirrecurso.html.twig")
     */
    public function anadirRecursoAction(Request $request)
    {
        $entity = new Recurso();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);


       if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        
             return $this->redirect($this->generateUrl('recurso_show', array('id' => $entity->getId())));
        }

        return $this->render('LangLanguageBundle:Recurso:anadirrecurso.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Recurso entity.
     *
     * @param Recurso $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Recurso $entity)
    {
        $form = $this->createForm(new RecursoType(), $entity, array(
            'action' => $this->generateUrl('recurso_anadir'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Recurso entity.
     *
     * @Route("/new", name="recurso_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Recurso();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Recurso entity.
     *
     * @Route("/{id}", name="recurso_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LangLanguageBundle:Recurso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Recurso entity.');
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
     * Displays a form to edit an existing Recurso entity.
     * Accion que se llama al abrirse una URL de edicion de recurso
     * @Route("/{id}/edit", name="recurso_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LangLanguageBundle:Recurso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Recurso entity.');
            
        }

        $form = $this->createEditForm($entity);
        return $this->render('LangLanguageBundle:Recurso:edit.html.twig', array(
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
    * Creates a form to edit a Recurso entity.
    *
    * @param Recurso $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Recurso $entity)
    {
        $form = $this->createForm(new RecursoActType(), $entity, array(
            'action' => $this->generateUrl('recurso_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        

        return $form;
    }
    /**
     * Edits an existing Recurso entity.
     *
     * @Route("/{id}", name="recurso_update")
     * @Method("PUT")
     * @Template("LangLanguageBundle:Recurso:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {   
        $params = $this->getRequest()->request->all();
        var_dump($params);
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LangLanguageBundle:Recurso')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Recurso entity.');
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
            return $this->redirect($this->generateUrl('recurso_edit', array('id' => $id)));
            }
        //if ($update_form->isValid()) {           
        //    $em->flush();
        //    $session = $request->getSession();
        //    $session->getFlashBag()->add('notice', 'Datos modificados');
        //    return $this->redirect($this->generateUrl('recurso_edit', array('id' => $id)));
        //}
        //else{
        $prueba = $update_form->getData();
        var_dump($prueba);
        //}
        $formErrors = $this->getFormErrors($update_form);
        var_dump ($formErrors);
        //echo "no funca";
            return $this->render('LangLanguageBundle:Recurso:update.html.twig', array(
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
     * Deletes a Recurso entity.
     *
     * @Route("/{id}", name="recurso_delete")
     * @Method("DELETE")
     */  
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LangLanguageBundle:Recurso')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Recurso entity.');
            }
            //$em->remove($entity);
            //$em->flush();
            
            
            
            $conn = $this->getDoctrine()->getManager()->getConnection();
            $stmt = $conn->prepare("DELETE FROM recurso WHERE id = :recurso_id");
            $stmt->bindParam('recurso_id', $id); 
            $stmt->execute();
            $stmt = $conn->prepare("DELETE FROM os_recurso WHERE recurso_id = :recurso_id");
            $stmt->bindParam('recurso_id', $id); // BEWARE: this array has to have at least one element
            $stmt->execute();
        }

        return $this->redirect($this->generateUrl('recurso'));
    }

    /**
     * Creates a form to delete a Recurso entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recurso_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
