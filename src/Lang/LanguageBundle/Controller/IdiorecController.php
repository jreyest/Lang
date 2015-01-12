<?php
namespace Lang\LanguageBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Lang\LanguageBundle\Entity\Idiorec;
use Lang\LanguageBundle\Form\IdiorecType;
/**
 * Idiorec controller.
 *
 * @Route("/idiorec")
 */
class IdiorecController extends Controller
{
    /**
     * Lists all Idiorec entities.
     *
     * @Route("/", name="idiorec")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('LangLanguageBundle:Idiorec')->findAll();
        return array('entities' => $entities);
    }
    /**
     * Finds and displays a Idiorec entity.
     *
     * @Route("/{id}", name="idiorec_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LangLanguageBundle:Idiorec')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Idiorec entity.');
        }
        $deleteForm = $this->createDeleteForm($id);
        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }
    /**
     * Displays a form to create a new Idiorec entity.
     *
     * @Route("/new", name="idiorec_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Idiorec();
        $form   = $this->createForm(new IdiorecType(), $entity);
        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }
    /**
     * Creates a new Idiorec entity.
     *
     * @Route("/create", name="idiorec_create")
     * @Method("post")
     * @Template("LangLanguageBundle:Idiorec:create.html.twig")
     */
    public function createAction()
    {
        $entity  = new Idiorec();
        $request = $this->getRequest();
        $form    = $this->createForm(new IdiorecType(), $entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('idiorec_show', array('id' => $entity->getId())));
            
        }
        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }
    /**
     * Displays a form to edit an existing Idiorec entity.
     *
     * @Route("/{id}/edit", name="idiorec_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LangLanguageBundle:Idiorec')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Idiorec entity.');
        }
        $editForm = $this->createForm(new IdiorecType(), $entity);
        $deleteForm = $this->createDeleteForm($id);
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Edits an existing Idiorec entity.
     *
     * @Route("/{id}", name="idiorec_update")
     * @Method("PUT")
     * @Template("LangLanguageBundle:Idiorec:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LangLanguageBundle:Idiorec')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Idiorec entity.');
        }
        $editForm   = $this->createForm(new IdiorecType(), $entity);
        $deleteForm = $this->createDeleteForm($id);
        $request = $this->getRequest();
        $editForm->handleRequest($request);
        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('recurso_edit', array('id' => $id)));
        }
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ProductOrder entity.
     *
     * @Route("/{id}", name="idiorec_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LangLanguageBundle:Idiorec')->find($id);
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Idiorec entity.');
            }
            $em->remove($entity);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('idiorec'));
    }
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
?>