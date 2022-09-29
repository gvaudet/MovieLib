<?php

namespace App\Controller;

use App\Entity\Film;
use App\Form\FilmType;
use App\Repository\FilmRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/film', 'film_')]

class FilmController extends AbstractController
{

    #[Route('', name: 'list')]
    public function list(FilmRepository $filmRepository): Response
    {
        $films = $filmRepository->findAll();
        // dd($films);

        return $this->render('film/list.html.twig', [
            'controller_name' => 'FilmController',
            'films' => $films,
        ]);
    }

    #[Route('/{id}', name: 'single', requirements: ["id"=> "\d+"])]
    public function single($id, FilmRepository $filmRepository): Response
    {
        $singleFilm = $filmRepository->find($id); 
        dump($singleFilm);

        return $this->render('film/single.html.twig', [
            'single' => $singleFilm,
        ]);
    }

    #[Route('/nouveau', name: 'form')]
    public function form(Request $request, FilmRepository $filmRepository): Response
    {
        $film = new Film(); 
        $form = $this->createForm(FilmType::class, $film);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $filmRepository->save($film, true);

            $this->addFlash('success', ' Élément bien ajouté à la BDD');

            return $this->redirectToRoute('film_single', [
                'id' => $film->getId(),
            ]);
        }
        
        return $this->render('film/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
