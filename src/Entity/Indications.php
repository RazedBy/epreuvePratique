<?php

namespace App\Entity;

use App\Repository\IndicationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IndicationsRepository::class)]
class Indications
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $posologie = null;

    #[ORM\ManyToOne(inversedBy: 'indications')]
    private ?Medicamen $medicament = null;

    #[ORM\ManyToOne(inversedBy: 'indications')]
    private ?Prescription $prescription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosologie(): ?string
    {
        return $this->posologie;
    }

    public function setPosologie(string $posologie): static
    {
        $this->posologie = $posologie;

        return $this;
    }

    public function getMedicament(): ?Medicamen
    {
        return $this->medicament;
    }

    public function setMedicament(?Medicamen $medicament): static
    {
        $this->medicament = $medicament;

        return $this;
    }

    public function getPrescription(): ?Prescription
    {
        return $this->prescription;
    }

    public function setPrescription(?Prescription $prescription): static
    {
        $this->prescription = $prescription;

        return $this;
    }
}
