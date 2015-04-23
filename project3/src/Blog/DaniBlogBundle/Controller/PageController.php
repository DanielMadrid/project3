<?php

namespace Blog\DaniBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blog\DaniBlogBundle\Entity\Enquiry;
use Blog\DaniBlogBundle\Entity\EnquiryType;

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


    public function contactAction()
    {
        $title = "Contact";
        $text = "Do you want to contact us? just do it!";

        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // realiza alguna acción, como enviar un correo electrónico

                // Redirige - Esto es importante para prevenir que el usuario
                // reenvíe el formulario si actualiza la página
                return $this->redirect($this->generateUrl('DaniBlogBundle_contact'));
            }
        }

        return $this->render(
            'DaniBlogBundle:Page:contact.html.twig'
            , array(
                'title' => $title
                , 'text' => $text
                ,'form' => $form->createView()
            )
        );
    }


    public function blogAction($blogId)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render(
            'DaniBlogBundle:Page:index.html.twig'
            , array(
                'blog' => $blog,
            )
        );
    }
}
