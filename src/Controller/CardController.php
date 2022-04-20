<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class CardController extends AbstractController
{
    /**
     * @Route("/card", name="card")
     */
    public function card(): Response
    {
        $data = [
            'title' => 'Card',
        ];

        return $this->render('card/card.html.twig', $data);
    }

    /**
     * @Route("/card/deck", name="deck")
     */
    public function deck(): Response
    {
        $deck = new \App\Card\Deck();
        $data = [
            'title' => 'Deck',
            'deck' => $deck->getDeck(),
        ];
        return $this->render('card/deck.html.twig', $data);
    }

    /**
     * @Route("/card/deck/shuffle", name="shuffle")
     */
    public function shuffle(): Response
    {
        $deck = new \App\Card\Deck();
        $deck = $deck->getDeck();
        shuffle($deck);

        $data = [
            'title' => 'Shuffle',
            'shuffled' => $deck,
        ];

        return $this->render('card/shuffle.html.twig', $data);
    }

    /**
     * @Route("/card/deck/draw", name="draw", methods={"GET", "HEAD"})
     */
    public function draw(
        SessionInterface $session
        ): Response
    {

        $card = $session->get("card") ?? 'back_card';

        $data = [
            'title' => 'Draw',
            'card' => $card,
        ];

        return $this->render('card/draw.html.twig', $data);
    }

    /**
     * @Route("/card/deck/draw", name="draw-process", methods={"POST"})
     */
    public function drawProcess(
        Request $request,
        SessionInterface $session
        ): Response
    {
        $newDeck = new \App\Card\Deck();
        $deck = $newDeck->getDeck();
        shuffle($deck);

        $draw = $request->request->get('draw');
        $clear = $request->request->get('clear');

        $left = $session->get("left") ?? 52;
        $deck = $session->get("deck") ?? $deck;
        $card = $session->get("card") ?? null;


        if ($draw) {
            $card = array_shift($deck);
            $left = count($deck);

            $session->set("left", $left);
            $session->set("deck", $deck);
            $session->set("card", $card);

        } elseif ($clear) {
            $this->addFlash("warning", "You cleared the game.");

            $left = 52;
            $deck = new \App\Card\Deck();
            $deck = $deck->getDeck();
            shuffle($deck);

            $session->set("left", 52);
            $session->set("deck", $deck);
            $session->set("card", null);
        }

        $this->addFlash("info", "You have $left cards left.");

        return $this->redirectToRoute('draw');
    }

    /**
     * @Route("/card/deck/draw/{number}", name="draw-number-process", methods={"GET", "POST"})
     */
    public function drawNumberProcess(
        Request $request,
        SessionInterface $session,
        int $number
        ): Response
    {
        $newDeck = new \App\Card\Deck();
        $deck = $newDeck->getDeck();
        shuffle($deck);

        $card = $session->get("card") ?? null;

        $draw = $request->request->get('draw');
        $clear = $request->request->get('clear');

        $left = $session->get("left") ?? 52;
        $deck = $session->get("deck") ?? $deck;

        $cards = [];

        if ($draw) {
            for ($i = 1; $i <= $number; $i++) {
                $card = array_shift($deck);
                array_push($cards, $card);
            }

            $left = count($deck);

            $session->set("left", $left);
            $session->set("deck", $deck);

        } elseif ($clear) {
            $this->addFlash("warning", "You cleared the game.");

            $left = 52;
            $deck = new \App\Card\Deck();
            $deck = $deck->getDeck();
            shuffle($deck);

            $session->set("left", 52);
            $session->set("deck", $deck);
        }

        $this->addFlash("info", "You have $left cards left.");

        $data = [
            'title' => 'Draw number',
            'cards' => $cards,
            'number' => $number,
        ];

        return $this->render('card/draw-number.html.twig', $data);
    }

    /**
     * @Route("/card/deck2", name="deck2")
     */
    public function deckWith2Jokers(): Response
    {
        $deck = new \App\Card\DeckWith2Jokers();
        $deck = $deck->getDeckWithJokers();

        $data = [
            'title' => 'Deck with 2 jokers',
            'deck' => $deck,
        ];
        return $this->render('card/deck.html.twig', $data);
    }

}
