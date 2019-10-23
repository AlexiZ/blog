<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
    /**
     * @Route("/tag/{tag}")
     */
    public function search(string $tag)
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->withTag($tag);

        return $this->render('Tag/search.html.twig', [
            'articles' => $articles,
        ]);
    }
}