<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\ContractorRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContractorRepository::class)]
class Contractor
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $telegramId = null;

    #[ORM\Column(length: 30)]
    private ?string $firstname = null;

    #[ORM\Column(length: 30)]
    private ?string $lastname = null;

    #[ORM\Column(length: 30)]
    private ?string $patronymic = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(length: 30)]
    private ?string $phone = null;

    #[ORM\Column]
    private int $status;

    #[ORM\ManyToOne(targetEntity: ContractorTeam::class, inversedBy:"participants")]
    #[ORM\JoinColumn(nullable: true, name:"team_id", referencedColumnName:"id")]
    private ?ContractorTeam $team = null;

    #[ORM\OneToMany(targetEntity: ContractorTeam::class, mappedBy: 'leader')]
    private Collection $leadedTeams;

    #[ORM\ManyToOne(targetEntity: Manager::class, inversedBy:"contractors")]
    #[ORM\JoinColumn(nullable: false, name:"manager_id", referencedColumnName:"id")]
    private ?Manager $manager;

    #[ORM\ManyToOne(targetEntity: InterfaceLanguage::class, inversedBy:"contractors")]
    #[ORM\JoinColumn(nullable: false, name:"interface_language_id", referencedColumnName:"id")]
    private ?InterfaceLanguage $interfaceLanguage;

    #[ORM\ManyToOne(targetEntity: ContractLanguage::class, inversedBy:"primaryContractors")]
    #[ORM\JoinColumn(nullable: false, name:"primary_contract_language_id", referencedColumnName:"id")]
    private ?ContractLanguage $primaryContractLanguage;

    #[ORM\ManyToMany(targetEntity: ContractLanguage::class, inversedBy:"contractors")]
    #[ORM\JoinTable(name:"contractors_contract_languages")]
    private Collection $additionalContractLanguages;

    #[ORM\ManyToOne(targetEntity: ContractCountry::class, inversedBy:"primaryContractors")]
    #[ORM\JoinColumn(nullable: false, name:"primary_contract_country_id", referencedColumnName:"id")]
    private ?ContractLanguage $primaryContractCountry;

    #[ORM\OneToMany(targetEntity: Contractor::class, mappedBy: 'contractor')]
    private Collection $resumes;

    #[ORM\OneToOne(targetEntity: Location::class)]
    private Location $location;

    public function getId(): ?int
    {
        return $this->id;
    }
}
