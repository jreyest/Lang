<?php
namespace Lang\LanguageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Lang\LanguageBundle\Entity\OS;
use Lang\LanguageBundle\Form\OSType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * OS controller.
 *
 * @Route("/os")
 */
class OSController extends Controller
{
    /**
     * Lists all OS entities.
     *
     * @Route("/", name="os")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LangLanguageBundle:OS')->findAll();
        //var_dump($entities);
        return array(
            'entities' => $entities,
        );
    }
public function anadirosAction(Request $request)
    {
        $entity = new OS();
        $form = $this->createForm(new OSType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            //si el formulario fue rellenado y submited
            $em = $this->getDoctrine()->getManager();            
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('os'));
        }
        return $this->render('LangLanguageBundle:OS:anadiros.html.twig', array(
        'entity' => $entity,
        'form'   => $form->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing OS entity.
     * Accion que se llama al abrirse una URL de edicion de OS
     * @Route("/{id}/edit", name="os_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LangLanguageBundle:OS')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OS entity.');
            
        }

        $form = $this->createEditForm($entity);
        return $this->render('LangLanguageBundle:OS:edit.html.twig', array(
            'entity' => $entity,
            'id'        => $id,
            'edit_form'   => $form->createView(),
        ));
    }
    private function createEditForm(OS $entity)
    {
        $form = $this->createForm(new OSType(), $entity, array(
            'action' => $this->generateUrl('os_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        )); 
        return $form;
    }
    public function updateAction(Request $request, $id)
    {   
        $params = $this->getRequest()->request->all();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LangLanguageBundle:OS')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OS entity.');
        }
        $update_form = $this->createEditForm($entity);
        $update_form->bind($request);
        
        if ($update_form->isValid()) {
            $em->flush();
            $session = $request->getSession();
            $session->getFlashBag()->add('notice', 'Datos modificados');
            $mensaje = "Actualización efectuada";
            return $this->redirect($this->generateUrl('os_edit', array('id' => $id, 'mensaje' => $mensaje,)));
        }
        $formErrors = $this->getFormErrors($update_form);
        var_dump ($formErrors);
        //echo "no funca";
            return $this->render('LangLanguageBundle:OS:update.html.twig', array(
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
     * Deletes a OS entity.
     *
     * @Route("/{id}", name="os_delete")
     * @Method("DELETE")
     */  

            public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LangLanguageBundle:OS')->find($id);
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find OS entity.');
            }
            //$em->remove($entity);
            //$em->flush();
            $conn = $this->getDoctrine()->getManager()->getConnection();
            $stmt = $conn->prepare("DELETE FROM os WHERE id = :os_id");
            $stmt->bindParam('os_id', $id); 
            $stmt->execute();
            $stmt = $conn->prepare("DELETE FROM os_herramienta WHERE os_id = :os_id");
            $stmt->bindParam('os_id', $id); // BEWARE: this array has to have at least one element
            $stmt->execute();

            return $this->redirect($this->generateUrl('os'));
    }
    /**
     * Creates a form to delete a OS entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('os_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
?>
