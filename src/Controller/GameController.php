<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game")
     */
    public function game(
        SessionInterface $session,
    ): Response {
        $session->clear();
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
     * @SuppressWarnings(PHPMD.MissingImport)
     */
    public function gamePlay(
        SessionInterface $session,
        Request $request,
    ): Response {
        $lost = false;
        $won = false;

        $game = $session->get("game") ?? new \App\Card\Game();
        $session->set("game", $game);

        $deck = $game->getDeck();
        $player = $game->getPlayer();
        $dealer = $game->getDealer();
        $playersHand = $game->getPlayersHand();
        $dealersHand = $game->getDealersHand();

        $deck = $session->get("deck") ?? $deck;
        $card = $session->get("card") ?? 'back_card';
        $playersScore = $session->get("playersScore") ?? 0;
        $dealersScore = $session->get("dealersScore") ?? 0;

        $deal = $request->request->get("play");
        $stop = $request->request->get("stop");

        if ($deal) {
            $card = array_shift($deck);
            $value = $player->getValueFromFace(substr($card, 0, -1));
            $playersScore += $value;
            array_push($playersHand->hand, $card);

            $session->set("deck", $deck);
            $session->set("playersScore", $playersScore);

            if ($playersScore > 21) {
                $lost = true;
                $session->clear();
            }
        } elseif ($stop) {
            $this->addFlash("warning", "It's dealers turn.");
            while ($dealersScore <= 17) {
                $card = array_shift($deck);
                $value = $dealer->getValueFromFace(substr($card, 0, -1));
                $dealersScore += $value;
                array_push($dealersHand->hand, $card);

                $session->set("deck", $deck);
                $session->set("dealersScore", $dealersScore);
            }
            if ($playersScore == $dealersScore) {
                $lost = true;
            } elseif ($dealersScore > 21) {
                $won = true;
            } elseif ((21 - $dealersScore) < (21 - $playersScore)) {
                $lost = true;
            } else {
                $won = true;
            }

            $session->clear();
        }

        $data = [
            'title' => 'Game play',
            'card' => $card,
            'game' => $game,
            'playersHand' => $playersHand,
            'playersScore' => $playersScore,
            'dealersHand' => $dealersHand,
            'dealersScore' => $dealersScore,
            'lost' => $lost,
            'won' => $won
        ];

        return $this->render('game/play.html.twig', $data);
    }
}
