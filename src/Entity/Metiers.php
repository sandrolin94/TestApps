<?php

namespace App\Entity;

use App\Repository\MetiersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MetiersRepository::class)]
class Metiers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $metier = null;

    #[ORM\ManyToOne]
    private ?Filiers $filiers_id = null;

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

    public function getMetier(): ?string
    {
        return $this->metier;
    }

    public function setMetier(string $metier): static
    {
        $this->metier = $metier;

        return $this;
    }

    public function getFiliersId(): ?Filiers
    {
        return $this->filiers_id;
    }

    public function setFiliersId(?Filiers $filiers_id): static
    {
        $this->filiers_id = $filiers_id;

        return $this;
    }
}
