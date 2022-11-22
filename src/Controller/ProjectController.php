<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\MaternalMortality;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\MaternalMortalityRepository;
use App\Repository\ChildrenRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

use App\Project\ChartMothers;
use App\Project\ChartChildren;

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
        ChildrenRepository $childrenRepository
        ): Response
    {
        $numbersMothers = $maternalMortalityRepository->findAll();
        $chartMothers = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chartM = new ChartMothers($numbersMothers);
        $chartM->setChart($chartMothers);
        $readDataMothers = new ReadData();
        $readDataMothers->removeEntity($doctrine, $numbersMothers);
        $readDataMothers->addDataMothers($doctrine);
        print_r($chartM);

        $numbersChildren = $childrenRepository->findAll();
        $chartChildren = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chartCh = new ChartChildren($numbersChildren);
        $chartCh->setChart($chartChildren);
        $readDataChildren = new ReadData();
        $readDataChildren->removeEntity($doctrine, $numbersChildren);
        $readDataChildren->addDataChildren($doctrine);
        print_r($chartCh);

        $data = [
            'chartMothers' => $chartMothers,
            'chartChildren' => $chartChildren
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
}
