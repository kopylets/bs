<?php

namespace App\Entity;

use App\Repository\InterfaceLanguageRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterfaceLanguageRepository::class)]
class InterfaceLanguage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $code = null;

    #[ORM\OneToMany(targetEntity: Contractor::class, mappedBy: 'interfaceLanguage')]
    private Collection $contractors;

    public function getId(): ?int
    {
        return $this->id;
    }
}
