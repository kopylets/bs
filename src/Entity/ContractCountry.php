<?php

namespace App\Entity;

use App\Repository\ContractCountryRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContractCountryRepository::class)]
class ContractCountry
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $code = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\OneToMany(targetEntity: Contractor::class, mappedBy: 'primaryContractCountry')]
    private Collection $primaryContractors;

    public function getId(): ?int
    {
        return $this->id;
    }
}
