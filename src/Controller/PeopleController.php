<?php

namespace App\Controller;

use App\Entity\People;
use App\Form\PeopleType;
use App\Repository\PeopleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/people', 'people_')]

class PeopleController extends AbstractController
{

    #[Route('', name: 'list')]
    public function list(PeopleRepository $peopleRepository): Response
    {
        $people = $peopleRepository->findBy([], ["lastname" => "ASC"]);

        return $this->render('people/list.html.twig', [
            'controller_name' => 'PeopleController',
            'people' => $people
        ]);
    }

    #[Route('/{id}', name: 'single', requirements: ["id"=> "\d+"])]
    public function single($id, PeopleRepository $peopleRepository): Response
    {
        $singlePeople = $peopleRepository->find($id); 
        dump($singlePeople);

        return $this->render('people/single.html.twig', [
            'single' => $singlePeople,
        ]);
    }

    #[Route('/nouveau', name: 'form')]
    public function form(Request $request, PeopleRepository $peopleRepository): Response
    {
        $people = new People(); 
        $form = $this->createForm(PeopleType::class, $people);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $peopleRepository->save($people, true);

            $this->addFlash('success', ' Élément bien ajouté à la BDD');

            return $this->redirectToRoute('people_single', [
                'id' => $people->getId(),
            ]);
        }
        
        return $this->render('people/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
