<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DeckWith2Jokers.
 */
class DeckWith2JokersTest extends TestCase
{
    /**
     *  DeckWith2Jokers object
     *
     */
    public function testCreateDeckWith2Jokers()
    {
        $deck = new \App\Card\DeckWith2Jokers();
        $this->assertInstanceOf("\App\Card\DeckWith2Jokers", $deck);

        $res = $deck->getDeckWithJokers();
        $this->assertEquals(end($res), 'joker2');
    }
}
