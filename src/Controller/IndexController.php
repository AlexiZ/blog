<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
    * @Route("/")
    */
    public function index()
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findBy([], ['creationDate' => 'DESC'], 12);

        return $this->render('Index/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}