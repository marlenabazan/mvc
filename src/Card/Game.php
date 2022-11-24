<?php

namespace App\Card;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Card\Deck;
use App\Card\Card;
use App\Card\Player;

/**
 * Class Game
 *
 *
 * This will suppress MissingImport
 * warnings in this class
 *
 * @SuppressWarnings(PHPMD.MissingImport)
 */
class Game extends Deck
{
    protected $deck;
    protected Player $player;
    protected Player $dealer;

    /**
     * __construct
     *
     */
    public function __construct()
    {
        $this->deck = $this->getDeck();
        $this->player = new \App\Card\Player();
        $this->dealer = new \App\Card\Player();
    }

    /**
     * getDeck
     *
     * @return array
     */
    public function getDeck()
    {
        $this->deck = new \App\Card\Deck();
        $this->deck = $this->deck->getDeckStr();
        shuffle($this->deck);
        return $this->deck;
    }

    /**
     * getPlayer
     *
     * @return object
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * getDealer
     *
     * @return object
     */
    public function getDealer()
    {
        return $this->dealer;
    }

    /**
     * getPlayersHand
     *
     * @return object
     */
    public function getPlayersHand()
    {
        return $this->player->getPlayersHand();
    }

    /**
     * getDealersHand
     *
     * @return object
     */
    public function getDealersHand()
    {
        return $this->dealer->getPlayersHand();
    }

    /**
     * resetGame
     *
     * @return void
     */
    public function resetGame()
    {
        $this->player->emptyHand();
        $this->dealer->emptyHand();
    }
}
