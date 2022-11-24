<?php

namespace App\Project;

class ChartMothers
{
    /**
     * year
     *
     * @var array<int>
     */
    private $year = [];

    /**
     * maternalMortality
     *
     * @var array<int>
     */
    private $maternalMortality = [];

    /**
     * __construct
     *
     * @param array $numbers
     * @return void
     */
    public function __construct($numbers)
    {
        foreach ((array) $numbers as $line) {
            $this->year[] = $line->getYear();
            $this->maternalMortality[] = $line->getMaternalMortality();
        }
    }

    /**
     * setChart
     *
     * @param mixed $chart
     * @return void
     */
    public function setChart($chart): void
    {
        $chart->setData([
            'labels' => $this->year,
            'datasets' => [
                [
                    'label' => 'Mödradödlighet',
                    'backgroundColor' => 'blue',
                    'borderColor' => 'blue',
                    'data' => $this->maternalMortality,
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 6,
                ],
            ],
        ]);
    }
}
