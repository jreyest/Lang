<?php

namespace Lang\LanguageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Lang\LanguageBundle\Entity\Herramienta;
use Lang\LanguageBundle\Form\HerramientaType;

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

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Herramienta entity.
     *
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

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
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
        $form = $this->createForm(new HerramientaType(), $entity, array(
            'action' => $this->generateUrl('herramienta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

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
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LangLanguageBundle:Herramienta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Herramienta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('herramienta_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
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

            $em->remove($entity);
            $em->flush();
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
