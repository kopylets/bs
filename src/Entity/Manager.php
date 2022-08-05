<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\ManagerRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ManagerRepository::class)]
class Manager
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $telegramId = null;

    #[ORM\OneToMany(targetEntity: Contractor::class, mappedBy: 'manager')]
    private Collection $contractors;

    #[ORM\OneToMany(mappedBy: 'manager', targetEntity: ManagerContractorCommunicationRequest::class)]
    private Collection $contractorCommunicationRequests;

    public function getId(): ?int
    {
        return $this->id;
    }
}
