<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Card\Deck;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game")
     */
    public function game(): Response
    {
        $data = [
            'title' => 'Game'
        ];
        return $this->render('game/game.html.twig', $data);
    }

    /**
     * @Route("/game/doc", name="game-doc")
     */
    public function gameDoc(): Response
    {
        $data = [
            'title' => 'Game doc'
        ];
        return $this->render('game/doc.html.twig', $data);
    }

    /**
     * @Route("/game/play", name="game-play")
     */
    public function gamePlay(): Response
    {
        $data = [
            'title' => 'Game play'
        ];
        return $this->render('game/play.html.twig', $data);
    }
}
