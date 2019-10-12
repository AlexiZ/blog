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

    /**
     * @Route("/article/{slug}")
     */
    public function article(string $slug)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->findOneBySlug($slug);

        return $this->render('Index/article.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/tag/{tag}")
     */
    public function tag(string $tag)
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->withTag($tag);

        return $this->render('Index/search.html.twig', [
            'articles' => $articles,
        ]);
    }
}