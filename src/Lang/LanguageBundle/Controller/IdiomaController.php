<?php
namespace Lang\LanguageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Lang\LanguageBundle\Entity\Idioma;
use Lang\LanguageBundle\Form\IdiomaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Idioma controller.
 *
 * @Route("/idioma")
 */
class IdiomaController extends Controller
{
    /**
     * Lists all Idioma entities.
     *
     * @Route("/", name="idioma")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LangLanguageBundle:Idioma')->findAll();
        //var_dump($entities);
        return array(
            'entities' => $entities,
        );
    }
public function anadirIdiomaAction(Request $request)
    {
        $entity = new Idioma();
        $form = $this->createForm(new IdiomaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            //si el formulario fue rellenado y submited
            $em = $this->getDoctrine()->getManager();            
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('idioma'));
        }
        return $this->render('LangLanguageBundle:Idioma:anadirIdioma.html.twig', array(
        'entity' => $entity,
        'form'   => $form->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing Idioma entity.
     * Accion que se llama al abrirse una URL de edicion de Idioma
     * @Route("/{id}/edit", name="idioma_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LangLanguageBundle:Idioma')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Idioma entity.');
            
        }

        $form = $this->createEditForm($entity);
        return $this->render('LangLanguageBundle:Idioma:edit.html.twig', array(
            'entity' => $entity,
            'id'        => $id,
            'edit_form'   => $form->createView(),
        ));
    }
    private function createEditForm(Idioma $entity)
    {
        $form = $this->createForm(new IdiomaType(), $entity, array(
            'action' => $this->generateUrl('idioma_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        )); 
        return $form;
    }
    public function updateAction(Request $request, $id)
    {   
        $params = $this->getRequest()->request->all();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LangLanguageBundle:Idioma')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Idioma entity.');
        }
        $update_form = $this->createEditForm($entity);
        $update_form->bind($request);
        
        if ($update_form->isValid()) {
            $em->flush();
            $session = $request->getSession();
            $session->getFlashBag()->add('notice', 'Datos modificados');
            $mensaje = "Actualización efectuada";
            return $this->redirect($this->generateUrl('idioma_edit', array('id' => $id, 'mensaje' => $mensaje,)));
        }
        $formErrors = $this->getFormErrors($update_form);
        var_dump ($formErrors);
        //echo "no funca";
            return $this->render('LangLanguageBundle:Idioma:update.html.twig', array(
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
     * Deletes a Idioma entity.
     *
     * @Route("/{id}", name="idioma_delete")
     * @Method("DELETE")
     */  

            public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LangLanguageBundle:Idioma')->find($id);
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Idioma entity.');
            }
            //$em->remove($entity);
            //$em->flush();
            $conn = $this->getDoctrine()->getManager()->getConnection();
            $stmt = $conn->prepare("DELETE FROM idioma WHERE id = :idioma_id");
            $stmt->bindParam('idioma_id', $id); 
            $stmt->execute();
            $stmt = $conn->prepare("DELETE FROM idioma_herramienta WHERE idioma_id = :idioma_id");
            $stmt->bindParam('idioma_id', $id); // BEWARE: this array has to have at least one element
            $stmt->execute();

            return $this->redirect($this->generateUrl('idioma'));
    }
    /**
     * Creates a form to delete a Idioma entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('idioma_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
?>
