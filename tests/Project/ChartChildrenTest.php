<?php

namespace App\Project;

use PHPUnit\Framework\TestCase;

use App\Project\ChartChildren;
use App\Entity\Children;
use Symfony\UX\Chartjs\Model\Chart;

/**
 * Test cases for class ChartChildren.
 */
class ChartChildrenTest extends TestCase
{
    
    /**
     * testCreateEmptyChart
     * 
     * test create an empty ChartChildren object
     *
     * @return void
     */
    public function testCreateEmptyChart()
    {
        $numbers = [];

        $chart = new ChartChildren($numbers);

        $this->assertInstanceOf("\App\Project\ChartChildren", $chart);
    }
    
    /**
     * testCreateChart
     * 
     * test create ChartChildren object with data
     *
     * @return void
     */
    public function testCreateChart()
    {
        $childrenEntity = new Children();
        $childrenEntity->setYear(2000);
        $childrenEntity->setNeonatal(2);
        $childrenEntity->setInfant(3);
        $childrenEntity->setUnder5(4);
        $numbers = [$childrenEntity];

        $chartBuilder = new \Symfony\UX\Chartjs\Builder\ChartBuilder(Chart::TYPE_PIE);
        $chartChildren = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart = new ChartChildren($numbers);
        $chart->setChart($chartChildren);

        $this->assertInstanceOf("\App\Project\ChartChildren", $chart);
    }
}
