<?php
namespace Lang\LanguageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Lang\LanguageBundle\Entity\OS;
use Lang\LanguageBundle\Form\OSType;
use Symfony\Component\HttpFoundation\Response;

class OSController extends Controller
{
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
            return $this->redirect($this->generateUrl('lang_language_homepage'));
        }
        return $this->render('LangLanguageBundle:OS:anadiros.html.twig', array(
        'entity' => $entity,
        'form'   => $form->createView(),
        ));
    }
}
?>
