<?php

namespace App\Project;

class ChartMothers
{
    private $year = [];

    private $maternalMortality = [];

    public function __construct(array $numbers)
    {
        foreach ((array) $numbers as $line) {
            $this->year[] = $line->getYear();
            $this->maternalMortality[] = $line->getMaternalMortality();
        }
    }

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

    public function getMaternalMortality(): ?int
    {
        return $this->maternalMortality;
    }
}