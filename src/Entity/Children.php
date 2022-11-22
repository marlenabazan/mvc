<?php

namespace App\Entity;

use App\Repository\ChildrenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChildrenRepository::class)]
class Children
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $year;

    #[ORM\Column(type: 'integer')]
    private $neonatal;

    #[ORM\Column(type: 'integer')]
    private $infant;

    #[ORM\Column(type: 'integer')]
    private $under5;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getNeonatal(): ?int
    {
        return $this->neonatal;
    }

    public function setNeonatal(int $neonatal): self
    {
        $this->neonatal = $neonatal;

        return $this;
    }

    public function getInfant(): ?int
    {
        return $this->infant;
    }

    public function setInfant(int $infant): self
    {
        $this->infant = $infant;

        return $this;
    }

    public function getUnder5(): ?int
    {
        return $this->under5;
    }

    public function setUnder5(int $under5): self
    {
        $this->under5 = $under5;

        return $this;
    }
}
