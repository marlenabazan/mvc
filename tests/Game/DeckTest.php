<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Deck.
 */
class DeckTest extends TestCase
{
    /**
     * Construct deck object, verify its string representation and value of one card
     * 
     */
    public function testDeck()
    {
        $deck = new Deck();
        $this->assertInstanceOf("\App\Card\Deck", $deck);

        $resStr = $deck->getDeckStr();
        $this->assertEquals($resStr[0], '2H');
        $resValue = $deck->getValueFromFace('10');
        $this->assertEquals($resValue, 10);
    }
}