<?php

namespace App\Entity;

use App\Repository\ContractLanguageRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContractLanguageRepository::class)]
class ContractLanguage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $code = null;

    #[ORM\OneToMany(targetEntity: Contractor::class, mappedBy: 'primaryContractLanguage')]
    private Collection $primaryContractors;

    #[ORM\ManyToMany(targetEntity: Contractor::class, mappedBy: "additionalContractLanguages")]
    private Collection $contractors;

    public function getId(): ?int
    {
        return $this->id;
    }
}
