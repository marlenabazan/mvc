<?php

namespace App\Project;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class ReadData.
 */
class ReadDataTest extends TestCase
{
    /**
     * Construct object with arguments and verify its value
     *
     */
    public function testCreateReadData()
    {
        $data = new ReadData("../data/children.csv");
        $this->assertInstanceOf("\App\Project\ReadData", $data);
    }
}
