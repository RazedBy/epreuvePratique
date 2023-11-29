<?php

namespace App\Entity;

use App\Repository\MedicamenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedicamenRepository::class)]
class Medicamen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'medicament', targetEntity: Indications::class)]
    private Collection $indications;

    public function __construct()
    {
        $this->indications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

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
            $indication->setMedicament($this);
        }

        return $this;
    }

    public function removeIndication(Indications $indication): static
    {
        if ($this->indications->removeElement($indication)) {
            // set the owning side to null (unless already changed)
            if ($indication->getMedicament() === $this) {
                $indication->setMedicament(null);
            }
        }

        return $this;
    }
}
