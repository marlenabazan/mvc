<?php

namespace App\Card;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Card\Deck;
use App\Card\Card;
use App\Card\Player;

/**
 * Class Game
 */
class Game extends Deck
{
    protected $deck;
    protected $player;
    protected $bank;

    public function __construct()
    {
        $this->deck = new \App\Card\Deck();
        $this->deck = $this->deck->getDeck();
        shuffle($this->deck);
        $this->player = new \App\Card\Player();
        $this->dealer = new \App\Card\Player();
    }

    public function getDeck()
    {
        return $this->deck;
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function getDealer()
    {
        return $this->dealer;
    }

    public function getPlayersHand()
    {
        return $this->player->getPlayersHand();
    }

    public function getDealersHand()
    {
        return $this->dealer->getPlayersHand();
    }

    public function resetGame()
    {
        $this->player->emptyHand();
        $this->dealer->emptyHand();
    }
}
