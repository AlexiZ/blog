<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/{slug}")
     */
    public function article(string $slug)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->findOneBySlug($slug);

        $siblings = $this->getDoctrine()->getRepository(Article::class)->findSiblings($article->getId());

        return $this->render('Article/article.html.twig', [
            'article' => $article,
            'siblings' => $siblings,
        ]);
    }
}