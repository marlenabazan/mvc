<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Card\Deck;

class CardControllerJson extends AbstractController
{
    /**
     * @Route("/card/api/deck", name="deck-json")
     */
    public function deckJson(): Response
    {
        $deck = new \App\Card\Deck();
        $deck = $deck->getDeck();

        $data = [
            'title' => 'Deck Json',
            'deck' => $deck
        ];

        $response = new Response(json_encode($data, JSON_PRETTY_PRINT));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
