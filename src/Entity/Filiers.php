<?php

namespace App\Entity;

use App\Repository\FiliersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FiliersRepository::class)]
class Filiers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $filiere = null;

    #[ORM\ManyToOne]
    private ?Secteurs $secteurs_id = null;

    /**
     * @var Collection<int, Etablissements>
     */
    #[ORM\ManyToMany(targetEntity: Etablissements::class)]
    private Collection $etablissements;

    public function __construct()
    {
        $this->etablissements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getFiliere(): ?string
    {
        return $this->filiere;
    }

    public function setFiliere(string $filiere): static
    {
        $this->filiere = $filiere;

        return $this;
    }

    public function getSecteursId(): ?Secteurs
    {
        return $this->secteurs_id;
    }

    public function setSecteursId(?Secteurs $secteurs_id): static
    {
        $this->secteurs_id = $secteurs_id;

        return $this;
    }

    /**
     * @return Collection<int, Etablissements>
     */
    public function getEtablissements(): Collection
    {
        return $this->etablissements;
    }

    public function addEtablissement(Etablissements $etablissement): static
    {
        if (!$this->etablissements->contains($etablissement)) {
            $this->etablissements->add($etablissement);
        }

        return $this;
    }

    public function removeEtablissement(Etablissements $etablissement): static
    {
        $this->etablissements->removeElement($etablissement);

        return $this;
    }
}
