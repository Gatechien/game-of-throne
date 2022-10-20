<?php

namespace App\Controller;

use App\Repository\HeroeRepository;
use App\Repository\HouseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function home(HeroeRepository $heroeRepository): Response
    {
        return $this->render('front/home.html.twig', [
            'heroes' => $heroeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/houses", name="houses", methods={"GET"})
     */
    public function houses(HouseRepository $houseRepository): Response
    {
        return $this->render('front/houses.html.twig', [
            'houses' => $houseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/house/{id}", name="house", methods={"GET"})
     */
    public function house(int $id, HeroeRepository $heroeRepository): Response
    {
        return $this->render('front/house.html.twig', [
            'heroes' => $heroeRepository->findAllHeroesByHouse($id),
        ]);
    }

    /**
     * @Route("/heroe/{id}", name="character", methods={"GET"})
     */
    public function character(int $id, HeroeRepository $heroeRepository): Response
    {
        $heroe = $heroeRepository->find($id);
        
        if ($heroe->getFather() !== null) {
            $father = $heroeRepository->find($heroe->getFather());
        } else {
            $father = 'father';
        }
        if ($heroe->getMother() !== null) {
            $mother = $heroeRepository->find($heroe->getMother());
        } else {
            $mother = 'mother';
        }
        return $this->render('front/character.html.twig', [
            'heroe' => $heroe,
            'father' => $father,
            'mother' => $mother,
        ]);
    }
}
    

