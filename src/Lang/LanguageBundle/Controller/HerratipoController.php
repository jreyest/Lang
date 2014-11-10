<?php
namespace Lang\LanguageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Lang\LanguageBundle\Entity\Herratipo;
use Lang\LanguageBundle\Form\HerratipoType;
use Symfony\Component\HttpFoundation\Response;

class HerratipoController extends Controller
{
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
            return $this->redirect($this->generateUrl('lang_language_homepage'));
        }
        return $this->render('LangLanguageBundle:Herratipo:anadirherratipo.html.twig', array(
        'entity' => $entity,
        'form'   => $form->createView(),
        ));
    }
}
?>
