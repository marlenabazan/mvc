<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use App\Repository\MaternalMortalityRepository;
use App\Repository\ChildrenRepository;
use App\Repository\ChildrenPer1000Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
        MaternalMortalityRepository $maternalRepo,
        ChildrenRepository $childrenRepo,
        ChildrenPer1000Repository $childrenPer1000Repo
    ): Response {
        $numbersMothers = $maternalRepo->findAll();
        $chartMothers = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chartM = new ChartMothers($numbersMothers);
        $chartM->setChart($chartMothers);

        $numbersChildren = $childrenRepo->findAll();
        $chartChildren = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chartCh = new ChartChildren($numbersChildren);
        $chartCh->setChart($chartChildren);

        $numbersChildren1000 = $childrenPer1000Repo->findAll();
        $chartChildrenPer1000 = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chartCh1000 = new ChartChildrenPer1000($numbersChildren1000);
        $chartCh1000->setChart($chartChildrenPer1000);

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
        MaternalMortalityRepository $maternalRepo,
        ChildrenRepository $childrenRepo,
        ChildrenPer1000Repository $childrenPer1000Repo
    ): Response {
        $readData = new ReadData();
        $numbersMothers = $maternalRepo->findAll();
        $numbersChildren = $childrenRepo->findAll();
        $numbersChildren1000 = $childrenPer1000Repo->findAll();

        $readData->removeEntity($doctrine, $numbersMothers);
        $readData->removeEntity($doctrine, $numbersChildren);
        $readData->removeEntity($doctrine, $numbersChildren1000);

        $readData->addDataMothers($doctrine);
        $readData->addDataChildren($doctrine);
        $readData->addDataChildrenPer1000($doctrine);

        return $this->redirectToRoute('project');
    }

    /**
     * @Route("/proj/cleancode", name="cleancode")
     */
    public function cleanCode(): Response
    {
        return $this->render('project/clean-code.html.twig');
    }
}
