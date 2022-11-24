<?php

namespace App\Project;

class ChartChildren
{
    /**
     * year
     *
     * @var array<int>
     */
    private $year = [];

    /**
     * neonatal
     *
     * @var array<int>
     */
    private $neonatal = [];

    /**
     * infant
     *
     * @var array<int>
     */
    private $infant = [];

    /**
     * under5
     *
     * @var array<int>
     */
    private $under5 = [];

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
            $this->neonatal[] = $line->getNeonatal();
            $this->infant[] = $line->getInfant();
            $this->under5[] = $line->getUnder5();
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
                    'label' => 'Nyfödd',
                    'backgroundColor' => 'blue',
                    'borderColor' => 'blue',
                    'data' => $this->neonatal,
                ],
                [
                    'label' => 'Spädbarn',
                    'backgroundColor' => 'green',
                    'borderColor' => 'green',
                    'data' => $this->infant,
                ],
                [
                    'label' => 'Under 5',
                    'backgroundColor' => 'red',
                    'borderColor' => 'red',
                    'data' => $this->under5,
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 250,
                    'suggestedMax' => 400,
                ],
            ],
        ]);
    }
}
