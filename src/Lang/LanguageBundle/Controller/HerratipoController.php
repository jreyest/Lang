<?php
namespace Lang\LanguageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Lang\LanguageBundle\Entity\Herratipo;
use Lang\LanguageBundle\Form\HerratipoType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class HerratipoController extends Controller
{
    
    /**
     * Lists all herratipo entities.
     *
     * @Route("/", name="herratipo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LangLanguageBundle:Herratipo')->findAll();
        //var_dump($entities);
        return array(
            'entities' => $entities,
        );
    }
    public function anadirherratipoAction(Request $request)
    {
        $entity = new Herratipo();
        $form = $this->createForm(new HerratipoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            //si el formulario fue rellenado y submited
            $em = $this->getDoctrine()->getManager();            
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('herratipo'));
        }
        return $this->render('LangLanguageBundle:Herratipo:anadirherratipo.html.twig', array(
        'entity' => $entity,
        'form'   => $form->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing herratipo entity.
     * Accion que se llama al abrirse una URL de edicion de herratipo
     * @Route("/{id}/edit", name="herratipo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LangLanguageBundle:Herratipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Herratipo entity.');
            
        }

        $form = $this->createEditForm($entity);
        return $this->render('LangLanguageBundle:Herratipo:edit.html.twig', array(
            'entity' => $entity,
            'id'        => $id,
            'edit_form'   => $form->createView(),
        ));
    }
    private function createEditForm(Herratipo $entity)
    {
        $form = $this->createForm(new HerratipoType(), $entity, array(
            'action' => $this->generateUrl('herratipo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        )); 
        return $form;
    }
    public function updateAction(Request $request, $id)
    {   
        $params = $this->getRequest()->request->all();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LangLanguageBundle:Herratipo')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Herratipo entity.');
        }
        $update_form = $this->createEditForm($entity);
        $update_form->bind($request);
        
        if ($update_form->isValid()) {
            $em->flush();
            $session = $request->getSession();
            $session->getFlashBag()->add('notice', 'Datos modificados');
            $mensaje = "Actualización efectuada";
            return $this->redirect($this->generateUrl('herratipo_edit', array('id' => $id, 'mensaje' => $mensaje,)));
        }
        $formErrors = $this->getFormErrors($update_form);
        var_dump ($formErrors);
        //echo "no funca";
            return $this->render('LangLanguageBundle:Herratipo:update.html.twig', array(
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
     * Deletes a herratipo entity.
     *
     * @Route("/{id}", name="herratipo_delete")
     * @Method("DELETE")
     */  

            public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LangLanguageBundle:Herratipo')->find($id);
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Herratipo entity.');
            }
            //$em->remove($entity);
            //$em->flush();
            $conn = $this->getDoctrine()->getManager()->getConnection();
            $stmt = $conn->prepare("DELETE FROM herratipo WHERE id = :herratipo_id");
            $stmt->bindParam('herratipo_id', $id); 
            $stmt->execute();
            $stmt = $conn->prepare("UPDATE herramienta SET herratipo_id = NULL WHERE herratipo_id = :herratipo_id");
            $stmt->bindParam('herratipo_id', $id); // BEWARE: this array has to have at least one element
            $stmt->execute();

            return $this->redirect($this->generateUrl('herratipo'));
    }
    /**
     * Creates a form to delete a herratipo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('herratipo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
?>
