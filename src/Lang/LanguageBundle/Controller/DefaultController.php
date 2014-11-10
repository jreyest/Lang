<?php

namespace Lang\LanguageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LangLanguageBundle:Default:index.html.twig');
    }
}
