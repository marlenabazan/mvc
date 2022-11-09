<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Player.
 */
class PlayerTest extends TestCase
{
    /**
     * Construct player object
     *
     */
    public function testCreatePlayer()
    {
        $player = new Player();
        $this->assertInstanceOf("\App\Card\Player", $player);
    }

    /**
     * Test get players hand
     *
     */
    public function testGetPlayersHand()
    {
        $player = new Player();

        $res = $player->getPlayersHand();
        $this->assertInstanceOf("\App\Card\Hand", $res);
    }
}
