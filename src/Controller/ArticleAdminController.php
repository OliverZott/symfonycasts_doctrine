<?php


namespace App\Controller;


# use http\Env\Response;
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleAdminController extends AbstractController
{


    /**
     * @Route("/admin/article/new")
     * @param EntityManagerInterface $em
     * @return Response
     * @throws \Exception
     */
    public function new(EntityManagerInterface $em)
    {
        $article = new Article();
        $article->setTitle('Why Asteroids Taste Like Bacon')
            ->setSlug('why-asteroids-taste-like-bacon-'.rand(100, 999))
            ->setContent(<<<EOF
Test Text ..

blabla blub 

123
EOF
                )
        ;

        // publish only some articles
        if (rand(1, 10) > 2) {
            $article->setPublishedAt(new \DateTime(sprintf("-%d days", rand(1, 100))));
        }

        // Doctrine Entity Manager. When 'flush', doctrine sets ID
        $em->persist($article);
        $em->flush();

        return new Response(sprintf(
            'Niiice, new article id: #%d slug: %s',
            $article->getId(),
            $article->getSlug()
                            ));
    }


}