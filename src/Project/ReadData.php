<?php

namespace App\Project;

use App\Entity\MaternalMortality;
use App\Entity\Children;
use App\Entity\ChildrenPer1000;
use Doctrine\Persistence\ManagerRegistry;

class ReadData
{
    public function readData($file)
    {
        $numbers = [];
        $handle = fopen($file, "r");
        if ($handle !== false) {
            while (($row = fgetcsv($handle, 1000, ",")) !== false) {
                $num = count($row);
                for ($c = 0; $c < $num; $c++) {
                    array_push($numbers, $row[$c]);
                }
            }
            fclose($handle);
        }
        return $numbers;
    }

    public function removeEntity(
        ManagerRegistry $doctrine,
        array $numbers
    ) {
        $entityManager = $doctrine->getManager();
        foreach ($numbers as $number) {
            $entityManager->remove($number);
        };
    }

    public function addDataMothers(
        ManagerRegistry $doctrine,
    ) {
        $numbers = $this->readData("../data/maternal-mortality.csv");
        $numbersLength = count($numbers);

        for ($c = 2; $c < $numbersLength; $c++) {
            $entityManager = $doctrine->getManager();

            $chart1 = new MaternalMortality();
            $chart1->setYear($numbers[$c]);
            $c++;
            $chart1->setMaternalMortality($numbers[$c]);

            $entityManager->persist($chart1);

            $entityManager->flush();
        }
    }

    public function addDataChildren(
        ManagerRegistry $doctrine,
    ) {
        $numbers = $this->readData("../data/children.csv");
        $numbersLength = count($numbers);

        for ($c = 0; $c < $numbersLength; $c++) {
            $entityManager = $doctrine->getManager();

            $chartChildren = new Children();
            $chartChildren->setYear($numbers[$c]);
            $c++;
            $chartChildren->setNeonatal($numbers[$c]);
            $c++;
            $chartChildren->setInfant($numbers[$c]);
            $c++;
            $chartChildren->setUnder5($numbers[$c]);

            $entityManager->persist($chartChildren);

            $entityManager->flush();
        }
    }

    public function addDataChildrenPer1000(
        ManagerRegistry $doctrine,
    ) {
        $numbers = $this->readData("../data/childrenPer1000.csv");
        $numbersLength = count($numbers);

        for ($c = 0; $c < $numbersLength; $c++) {
            $entityManager = $doctrine->getManager();

            $chartChildrenPer1000 = new ChildrenPer1000();
            $chartChildrenPer1000->setYear($numbers[$c]);
            $c++;
            $chartChildrenPer1000->setNeonatal($numbers[$c]);
            $c++;
            $chartChildrenPer1000->setInfant($numbers[$c]);
            $c++;
            $chartChildrenPer1000->setUnder5($numbers[$c]);

            $entityManager->persist($chartChildrenPer1000);

            $entityManager->flush();
        }
    }
}