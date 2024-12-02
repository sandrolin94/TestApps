<?php

namespace App\Controller;

use App\Entity\Regions;
use App\Form\RegionsType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RegionController extends AbstractController
{
    #[Route('/region', name: 'app_region')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $regions = new Regions();
        $formregions = $this->createForm(RegionsType::class, $regions);
        $formregions->handleRequest($request);

        if ($formregions->isSubmitted() && $formregions->isValid()) {
               
                $em = $doctrine->getManager();
                $em->persist($formregions->getData());
                $em->flush();
                return $this->redirectToRoute('app_region');
        }
        $readregions = $doctrine->getRepository(Regions::class);
        return $this->render('region/index.html.twig', [
            'formregions' => $formregions,
            'listsregions'=>$readregions->findAll()
        ]);
    }

}
