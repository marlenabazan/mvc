<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\MaternalMortality;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\MaternalMortalityRepository;
use App\Repository\ChildrenRepository;
use App\Repository\ChildrenPer1000Repository;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

use App\Project\ChartMothers;
use App\Project\ChartChildren;
use App\Project\ChartChildrenPer1000;


use App\Project\ReadData;


class ProjectController extends AbstractController
{
    /**
     * @Route("/proj", name="project")
     */
    public function project(
        ChartBuilderInterface $chartBuilder,
        ManagerRegistry $doctrine,
        MaternalMortalityRepository $maternalMortalityRepository,
        ChildrenRepository $childrenRepository,
        ChildrenPer1000Repository $childrenPer1000Repository
        ): Response
    {
        $numbersMothers = $maternalMortalityRepository->findAll();
        var_dump($numbersMothers);
        $chartMothers = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chartM = new ChartMothers($numbersMothers);
        $chartM->setChart($chartMothers);
        // $readDataMothers = new ReadData();
        // $readDataMothers->removeEntity($doctrine, $numbersMothers);
        // $readDataMothers->addDataMothers($doctrine);
        // print_r($chartM);

        $numbersChildren = $childrenRepository->findAll();
        var_dump($numbersChildren);

        $chartChildren = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chartCh = new ChartChildren($numbersChildren);
        $chartCh->setChart($chartChildren);
        // $readDataChildren = new ReadData();
        // $readDataChildren->removeEntity($doctrine, $numbersChildren);
        // $readDataChildren->addDataChildren($doctrine);
        // print_r($chartCh);

        $numbersChildrenPer1000 = $childrenPer1000Repository->findAll();
        var_dump($numbersChildrenPer1000);

        $chartChildrenPer1000 = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chartCh1000 = new ChartChildrenPer1000($numbersChildrenPer1000);
        $chartCh1000->setChart($chartChildrenPer1000);
        // $readDataChildrenPer1000 = new ReadData();
        // $readDataChildrenPer1000->removeEntity($doctrine, $numbersChildrenPer1000);
        // $readDataChildrenPer1000->addDataChildrenPer1000($doctrine);
        // print_r($chartCh1000);

        $data = [
            'chartMothers' => $chartMothers,
            'chartChildren' => $chartChildren,
            'chartChildrenPer1000' => $chartChildrenPer1000
        ];

        return $this->render('project/project.html.twig', $data);
    }

    /**
     * @Route("/proj/about", name="about-project")
     */
    public function aboutProject(): Response
    {
        return $this->render('project/about-project.html.twig');
    }

    /**
     * @Route("/proj/reset", name="reset")
     */
    public function resetDatabase(
        ManagerRegistry $doctrine,
        MaternalMortalityRepository $maternalMortalityRepository,
        ChildrenRepository $childrenRepository,
        ChildrenPer1000Repository $childrenPer1000Repository
    ): Response
    {
        $readData = new ReadData();
        $numbersMothers = $maternalMortalityRepository->findAll();
        $numbersChildren = $childrenRepository->findAll();
        $numbersChildrenPer1000 = $childrenPer1000Repository->findAll();

        $readData->removeEntity($doctrine, $numbersMothers);
        $readData->removeEntity($doctrine, $numbersChildren);
        $readData->removeEntity($doctrine, $numbersChildrenPer1000);

        $readData->addDataMothers($doctrine);
        $readData->addDataChildren($doctrine);
        $readData->addDataChildrenPer1000($doctrine);

        return $this->redirectToRoute('project');
    }
}
