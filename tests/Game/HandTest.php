<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Hand.
 */
class HandTest extends TestCase
{
    /**
     * Construct hand object
     *
     */
    public function testCreateHand()
    {
        $hand = new Hand();
        $this->assertInstanceOf("\App\Card\Hand", $hand);
    }

    /**
     * Test add card to hand
     *
     */
    public function testAddCard()
    {
        $hand = new Hand();
        $hand->addCard('6H');

        $this->assertEquals($hand->hand[0], '6H');
    }
}
