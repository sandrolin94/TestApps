<?php

namespace App\Entity;

use App\Repository\ReferentielsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReferentielsRepository::class)]
class Referentiels
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $referentiel = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $fichier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReferentiel(): ?string
    {
        return $this->referentiel;
    }

    public function setReferentiel(?string $referentiel): static
    {
        $this->referentiel = $referentiel;

        return $this;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(?string $fichier): static
    {
        $this->fichier = $fichier;

        return $this;
    }
}
