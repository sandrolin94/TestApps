<?php

namespace App\Entity;

use App\Repository\RegionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegionsRepository::class)]
class Regions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    /**
     * @var Collection<int, Districts>
     */
    #[ORM\OneToMany(targetEntity: Districts::class, mappedBy: 'regions_id')]
    private Collection $districts;

    public function __construct()
    {
        $this->districts = new ArrayCollection();
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

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return Collection<int, Districts>
     */
    public function getDistricts(): Collection
    {
        return $this->districts;
    }

    public function addDistrict(Districts $district): static
    {
        if (!$this->districts->contains($district)) {
            $this->districts->add($district);
            $district->setRegionsId($this);
        }

        return $this;
    }

    public function removeDistrict(Districts $district): static
    {
        if ($this->districts->removeElement($district)) {
            // set the owning side to null (unless already changed)
            if ($district->getRegionsId() === $this) {
                $district->setRegionsId(null);
            }
        }

        return $this;
    }
}
