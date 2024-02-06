<?php

namespace App\Controller;

use App\Entity\VinylMix;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MixController extends AbstractController
{
    #[Route("/mix/new")]
    public function new(EntityManagerInterface $entityManager): Response
    {
        $mix = new VinylMix();
        $mix->setTitle("7 Vidas - Brock Ansiolitiko");
        $mix->setDescription("Ta guapa");
        $mix->setGenre("rap");
        $mix->setVotes((rand(-50, 50)));
        $mix->setTrackCount((rand(1, 55)));
        $entityManager->persist($mix);
        $entityManager->flush();
        dd($mix);
        return new Response(
            sprintf(
                "Mix %d is %d tracks of pure 80\'s heaven",
                $mix->getId(),
                $mix->getTrackCount()
            )
        );
    }
}
