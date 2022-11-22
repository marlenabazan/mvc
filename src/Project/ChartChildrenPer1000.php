<?php

namespace App\Project;

class ChartChildrenPer1000
{
    private $year = [];

    private $neonatal = [];

    private $infant = [];

    private $under5 = [];

    public function __construct(array $numbers)
    {
        foreach ((array) $numbers as $line) {
            $this->year[] = $line->getYear();
            $this->neonatal[] = $line->getNeonatal();
            $this->infant[] = $line->getInfant();
            $this->under5[] = $line->getUnder5();
        }
    }

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
                    'suggestedMin' => 0,
                    'suggestedMax' => 4,
                ],
            ],
        ]);
    }
}