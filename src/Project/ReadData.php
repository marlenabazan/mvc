<?php

namespace App\Project;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

use App\Entity\MaternalMortality;
use App\Repository\MaternalMortalityRepository;

use Doctrine\Persistence\ManagerRegistry;


class ReadData {

    public function readData($file) {
        // $rowNo = 1;
        $numbers = [];
        // $fp is file pointer to file sample.csv
        if (($fp = fopen($file, "r")) !== FALSE) {
        while (($row = fgetcsv($fp, 1000, ",")) !== FALSE) {
        $num = count($row);
        // echo "<p> $num fields in line $rowNo: <br /></p>\n";
        // $rowNo++;
        for ($c=0; $c < $num; $c++) {
            array_push($numbers, $row[$c]);
        // echo $row[$c] . "<br />\n";
        }
        }
        fclose($fp);
        }
        // print_r($numbers);
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
        // MaternalMortalityRepository $maternalMortalityRepository,
        ManagerRegistry $doctrine,
    ) {

        $numbers = $this->readData("../data/maternal-mortality.csv");

        // $entityManager = $doctrine->getManager();

        for ($c=2; $c < count($numbers); $c++) {
            $entityManager = $doctrine->getManager();

            $chart1 = new MaternalMortality();
            // echo $numbers[$c];
            $chart1->setYear($numbers[$c]);
            $c++;
            $chart1->setMaternalMortality($numbers[$c]);

            $entityManager->persist($chart1);

            $entityManager->flush();
            // var_dump($chart1);
        }

        // $rowNo = 1;
        // // $fp is file pointer to file sample.csv
        // if (($fp = fopen("../data/maternal-mortality.csv", "r")) !== FALSE) {
        // while (($row = fgetcsv($fp, 1000, ",")) !== FALSE) {
        // $num = count($row);

        // // echo "<p> $num fields in line $rowNo: <br /></p>\n";
        // $rowNo++;

        // for ($c=0; $c < $num; $c++) {
        //     $chart1->setYear($row[$c]);
        //     // echo "row[c]" . $row[$c] . "<br />\n";
        //     $c++;
        //     $chart1->setMaternalMortality($row[$c]);
        // }

        // }
        // fclose($fp);
        // }




        // var_dump($chart1);

        // $entityManager->persist($chart1);

        // $entityManager->flush();
        // return $chart1;
    }
}
