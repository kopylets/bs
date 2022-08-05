<?php

namespace App\Entity;

use App\Repository\ManagerContractorCommunicationRequestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ManagerContractorCommunicationRequestRepository::class)]
class ManagerContractorCommunicationRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\ManyToOne(targetEntity: Manager::class, inversedBy:"contractorCommunicationRequests")]
    #[ORM\JoinColumn(nullable: false, name:"manager_id", referencedColumnName:"id")]
    private ?Manager $manager;

    #[ORM\ManyToOne(targetEntity: Contractor::class, inversedBy:"managerCommunicationRequests")]
    #[ORM\JoinColumn(name: "contractor_id", referencedColumnName: "id")]
    private Contractor $contractor;

    public function getId(): ?int
    {
        return $this->id;
    }
}
