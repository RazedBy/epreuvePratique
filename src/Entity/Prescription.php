<?php

namespace App\Entity;

use App\Repository\PrescriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrescriptionRepository::class)]
class Prescription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\OneToMany(mappedBy: 'prescription', targetEntity: Indications::class)]
    private Collection $indications;

    public function __construct()
    {
        $this->indications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection<int, Indications>
     */
    public function getIndications(): Collection
    {
        return $this->indications;
    }

    public function addIndication(Indications $indication): static
    {
        if (!$this->indications->contains($indication)) {
            $this->indications->add($indication);
            $indication->setPrescription($this);
        }

        return $this;
    }

    public function removeIndication(Indications $indication): static
    {
        if ($this->indications->removeElement($indication)) {
            // set the owning side to null (unless already changed)
            if ($indication->getPrescription() === $this) {
                $indication->setPrescription(null);
            }
        }

        return $this;
    }
}
