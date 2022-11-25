<?php

namespace App\Project;

use PHPUnit\Framework\TestCase;

use App\Project\ChartMothers;
use App\Entity\MaternalMortality;
use Symfony\UX\Chartjs\Model\Chart;

/**
 * Test cases for class ChartChildren.
 */
class ChartMothersTest extends TestCase
{
    /**
     * testCreateEmptyChart
     * 
     * test create an empty ChartMothers object
     *
     * @return void
     */
    public function testCreateEmptyChart()
    {
        $numbers = [];

        $chart = new ChartMothers($numbers);

        $this->assertInstanceOf("\App\Project\ChartMothers", $chart);
    }

    /**
     * testCreateChart
     * 
     * test create ChartMothers object with data
     *
     * @return void
     */
    public function testCreateChart()
    {
        $mothersEntity = new MaternalMortality();
        $mothersEntity->setYear(2000);
        $mothersEntity->setMaternalMortality(4);
        $numbers = [$mothersEntity];

        $chartBuilder = new \Symfony\UX\Chartjs\Builder\ChartBuilder(Chart::TYPE_PIE);
        $chartMothers = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart = new ChartMothers($numbers);
        $chart->setChart($chartMothers);

        $this->assertInstanceOf("\App\Project\ChartMothers", $chart);
    }
}
