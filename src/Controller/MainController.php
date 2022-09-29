<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use App\Repository\PeopleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('', name: 'main_')]

class MainController extends AbstractController
{
    public function __construct(private FilmRepository $FilmRepository)
    {
    }

    #[Route('/', name: 'index')]

    public function index(PeopleRepository $PeopleRepository): Response
    {
        $films = $this->FilmRepository->findBy([]);
        $people =$PeopleRepository->findBy([]);
        // dd($people);

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'films' => $films,
            'people' => $people,
        ]);
    }
}
