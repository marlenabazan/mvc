<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\MaternalMortality;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\MaternalMortalityRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

use App\Project\ChartMothers;
use App\Project\ReadData;


class ProjectController extends AbstractController
{
    /**
     * @Route("/proj", name="project")
     */
    public function project(
        ChartBuilderInterface $chartBuilder,
        ManagerRegistry $doctrine,
        MaternalMortalityRepository $maternalMortalityRepository
        ): Response
    {

        $numbers = $maternalMortalityRepository->findAll();
        $chartMothers = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart1 = new ChartMothers($numbers);
        $chart1->setChart($chartMothers);
        $testRead = new ReadData();
        $testRead->removeEntity($doctrine, $numbers);
        $testRead->addDataMothers($doctrine);
        print_r($chart1);

        $data = [
            'chart' => $chartMothers,
            // 'testRead' => $testRead
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
