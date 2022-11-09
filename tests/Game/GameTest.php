<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Game.
 */
class GameTest extends TestCase
{
    /**
     * Construct game object
     *
     */
    public function testCreateGame()
    {
        $game = new Game();
        $this->assertInstanceOf("\App\Card\Game", $game);
    }

    /**
     * Test get deck
     *
     */
    public function testGetDeck()
    {
        $game = new Game();

        $res = $game->getDeck();
        $this->assertEquals(count($res), 52);
    }

    /**
     * Test get player and dealer
     *
     */
    public function testGetPlayer()
    {
        $game = new Game();

        $resPlayer = $game->getPlayer();
        $this->assertInstanceOf("\App\Card\Player", $resPlayer);

        $resDealer = $game->getDealer();
        $this->assertInstanceOf("\App\Card\Player", $resDealer);
    }

    /**
     * Test get players and dealers hand
     *
     */
    public function testGetPlayersHand()
    {
        $game = new Game();

        $resPlayersHand = $game->getPlayersHand();
        $this->assertInstanceOf("\App\Card\Hand", $resPlayersHand);

        $resDealersHand = $game->getDealersHand();
        $this->assertInstanceOf("\App\Card\Hand", $resDealersHand);
    }

    /**
     * Test reset game
     *
     */
    public function testResetGame()
    {
        $game = new Game();

        $playersHand = $game->getPlayersHand();
        $dealersHand = $game->getDealersHand();

        $game->resetGame();

        $this->assertInstanceOf("\App\Card\Hand", $playersHand);
        $this->assertInstanceOf("\App\Card\Hand", $dealersHand);
    }
}
