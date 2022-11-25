<?php

namespace App\Project;

use PHPUnit\Framework\TestCase;

use App\Project\ChartChildrenPer1000;
use App\Entity\ChildrenPer1000;
use Symfony\UX\Chartjs\Model\Chart;

/**
 * Test cases for class ChartChildren.
 */
class ChartChildrenPer1000Test extends TestCase
{
        
    /**
     * testCreateEmptyChart
     * 
     * test create an empty ChartChildrenPer1000 object
     *
     * @return void
     */
    public function testCreateEmptyChart()
    {
        $numbers = [];

        $chart = new ChartChildrenPer1000($numbers);

        $this->assertInstanceOf("\App\Project\ChartChildrenPer1000", $chart);
    }
    
    /**
     * testCreateChart
     * 
     * test create ChartChildrenPer1000 object with data
     *
     * @return void
     */
    public function testCreateChart()
    {
        $childrenEntity = new ChildrenPer1000();
        $childrenEntity->setYear(2000);
        $childrenEntity->setNeonatal(2);
        $childrenEntity->setInfant(3);
        $childrenEntity->setUnder5(4);
        $numbers = [$childrenEntity];

        $chartBuilder = new \Symfony\UX\Chartjs\Builder\ChartBuilder(Chart::TYPE_PIE);
        $chartChildrenPer1000 = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart = new ChartChildrenPer1000($numbers);
        $chart->setChart($chartChildrenPer1000);

        $this->assertInstanceOf("\App\Project\ChartChildrenPer1000", $chart);
    }
}
