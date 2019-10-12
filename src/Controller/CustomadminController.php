<?php

namespace App\Controller;

use App\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CustomadminController extends AbstractController
{
    /**
     * @Route("/admin/article/front")
     * @Security("has_role('ROLE_ADMIN')")
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function front(Request $request)
    {
        $id = $request->query->get('id');
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        return $this->redirectToRoute('app_index_article', [
            'slug' => $article->getSlug(),
        ]);
    }
}