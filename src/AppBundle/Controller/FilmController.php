<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use AppBundle\Repository\FilmRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;

class FilmController extends Controller
{
    /**
     * @Route("/films", name="films")
     */
    public function filmListAction(Request $request)
    {
         $repo=$this->getDoctrine()->getRepository(Film::class);
        $films= $repo->findAll();
        // return $this->render('@App/Film/filmList.html.twig', [
        //     'films'=>$films
        // ]);
        $reservations  = $this->get('knp_paginator')->paginate(
            $films,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
              5/*nbre d'éléments par page*/
        );
        return $this->render('@App/Film/filmList.html.twig', [
                'films'=>$reservations
            ]);
    
    }

}