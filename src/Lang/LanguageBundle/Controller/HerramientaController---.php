<?php
namespace Lang\LanguageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Lang\LanguageBundle\Entity\Herramienta;
use Lang\LanguageBundle\Form\HerramientaType;
use Symfony\Component\HttpFoundation\Response;

class HerramientaController extends Controller
{
    public function pruebaAction()
    {
        return new Response('<html><body>Hello, esto es prueba!</body></html>');
    }
    public function anadirherraAction(Request $request)
    {
        $entity = new Herramienta();
        $form = $this->createForm(new HerramientaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            //si el formulario fue rellenado y submited
            $em = $this->getDoctrine()->getManager(); 
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('lang_language_homepage'));
        }
        return $this->render('LangLanguageBundle:Herramienta:anadirHerra.html.twig', array(
        'entity' => $entity,
        'form'   => $form->createView(),
        ));
    }
}
?>