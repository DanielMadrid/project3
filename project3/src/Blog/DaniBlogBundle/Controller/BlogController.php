<?php
// src/Dani/BlogBundle/Controller/BlogController.php

namespace Blog\DaniBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Controlador del Blog.
 */
class BlogController extends Controller
{
    /**
     * Muestra una entrada del blog
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('DaniBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('DaniBlogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
        ));
    }
}