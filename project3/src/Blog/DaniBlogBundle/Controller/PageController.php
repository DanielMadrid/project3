<?php

namespace Blog\DaniBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
	//We create some vars which are gonna be use to show the user where he is.
	//This vars are gonna be title and text.
	//title is a short name and text a short description.
	

    public function indexAction()
    {
    	$title = "Home";
    	$text = "Welcome to our Blog";

        return $this->render(
        	'DaniBlogBundle:Page:index.html.twig'
        	, array(
        		'title' => $title
        		, 'text' => $text
        	)
        );
    }
}
