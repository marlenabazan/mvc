<?php

namespace App\Project;

use PHPUnit\Framework\TestCase;

use App\Entity\MaternalMortality;
use App\Repository\MaternalMortalityRepository;

/**
 * Test cases for entity MaternalMortality.
 */
class EntityMothersTest extends TestCase
{
    /**
     * Test create MaternalMortality entity
     *
     */
    public function testCreateEntity()
    {
        $chart = new MaternalMortality();
        $chart->setYear(2000);
        $chart->setMaternalMortality(10);

        $chartRepository = $this->createMock(MaternalMortalityRepository::class);
        $chartRepository->expects($this->any())
            ->method('findAll')
            ->willReturn($chart);

        $this->assertEquals($chart->getYear(), 2000);
        $this->assertEquals($chart->getMaternalMortality(), 10);

    }
}
