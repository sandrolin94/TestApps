<?php

namespace App\Entity;

use App\Repository\SecteursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SecteursRepository::class)]
class Secteurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codesecteurs = null;

    #[ORM\Column(length: 255)]
    private ?string $secteur = null;

    /**
     * @var Collection<int, Entreprises>
     */
    #[ORM\ManyToMany(targetEntity: Entreprises::class)]
    private Collection $entreprises;

    public function __construct()
    {
        $this->entreprises = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodesecteurs(): ?string
    {
        return $this->codesecteurs;
    }

    public function setCodesecteurs(?string $codesecteurs): static
    {
        $this->codesecteurs = $codesecteurs;

        return $this;
    }

    public function getSecteur(): ?string
    {
        return $this->secteur;
    }

    public function setSecteur(string $secteur): static
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * @return Collection<int, Entreprises>
     */
    public function getEntreprises(): Collection
    {
        return $this->entreprises;
    }

    public function addEntreprise(Entreprises $entreprise): static
    {
        if (!$this->entreprises->contains($entreprise)) {
            $this->entreprises->add($entreprise);
        }

        return $this;
    }

    public function removeEntreprise(Entreprises $entreprise): static
    {
        $this->entreprises->removeElement($entreprise);

        return $this;
    }
}
