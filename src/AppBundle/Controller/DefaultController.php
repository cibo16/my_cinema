<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Repository\FilmRepository;
use AppBundle\Entity\Film;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $repo=$this->getDoctrine()->getRepository(Film::class);
        $films= $repo->findBy(array(), array('dateDebutAffiche' => 'DESC'), 5);
        return $this->render('my_cinema/index.html.twig', [
            'films'=>$films
        ]);
    }
}
