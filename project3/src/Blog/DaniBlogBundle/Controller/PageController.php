<?php

namespace Blog\DaniBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DaniBlogBundle:Page:index.html.twig', array('name' => $name));
    }
}
