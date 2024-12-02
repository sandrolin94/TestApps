<?php

namespace App\Entity;

use App\Repository\DistrictsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DistrictsRepository::class)]
class Districts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $district = null;

    #[ORM\ManyToOne(inversedBy: 'districts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?regions $regions_id = null;

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

    public function getDistrict(): ?string
    {
        return $this->district;
    }

    public function setDistrict(string $district): static
    {
        $this->district = $district;

        return $this;
    }

    public function getRegionsId(): ?regions
    {
        return $this->regions_id;
    }

    public function setRegionsId(?regions $regions_id): static
    {
        $this->regions_id = $regions_id;

        return $this;
    }
}
