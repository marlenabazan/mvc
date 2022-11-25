<?php

namespace App\Project;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class ChartChildren.
 */
class ChartChildrenTest extends TestCase
{
    /**
     * Construct object with arguments and verify its value
     *
     */
    public function testCreateChart()
    {
        $numbers = [];

        $chart = new ChartChildren($numbers);
        $this->assertInstanceOf("\App\Project\ChartChildren", $chart);
    }
}
