<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\ContractorTeamRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContractorTeamRepository::class)]
class ContractorTeam
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Contractor::class, inversedBy: 'leadedTeams')]
    #[ORM\JoinColumn(nullable: false)]
    private Contractor $leader;

    #[ORM\OneToMany(targetEntity: Contractor::class, mappedBy: 'team')]
    private Collection $participants;

    public function getId(): ?int
    {
        return $this->id;
    }
}
