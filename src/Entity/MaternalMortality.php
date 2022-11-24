<?php

namespace App\Entity;

use App\Repository\MaternalMortalityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
  * This will suppress ShortVariable
 * warnings in this class
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */

#[ORM\Entity(repositoryClass: MaternalMortalityRepository::class)]
class MaternalMortality
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $year;

    #[ORM\Column(type: 'integer')]
    private $maternalMortality;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getMaternalMortality(): ?int
    {
        return $this->maternalMortality;
    }

    public function setMaternalMortality(int $maternalMortality): self
    {
        $this->maternalMortality = $maternalMortality;

        return $this;
    }
}
