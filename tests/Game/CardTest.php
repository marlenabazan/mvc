<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Card.
 */
class CardTest extends TestCase
{
    /**
     * Construct card object with arguments and verify its value
     * 
     */
    public function testCreateCard()
    {
        $card = new Card(13, 'K', 'H', 'red');
        $this->assertInstanceOf("\App\Card\Card", $card);

        $res = $card->getValue();
        $this->assertEquals($res, 13);
    }
}