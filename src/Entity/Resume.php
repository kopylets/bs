<?php

namespace App\Entity;

use App\Repository\ResumeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResumeRepository::class)]
class Resume
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private int $status;

    #[ORM\ManyToOne(targetEntity: Contractor::class, inversedBy:"resumes")]
    #[ORM\JoinColumn(name: "contractor_id", referencedColumnName: "id")]
    private Contractor $contractor;

    #[ORM\ManyToOne(targetEntity: ResumeType::class, inversedBy:"resumes")]
    #[ORM\JoinColumn(name:"type_id", referencedColumnName:"id")]
    private ResumeType $type;

    #[ORM\ManyToOne(targetEntity: ResumeCondition::class, inversedBy:"resumes")]
    #[ORM\JoinColumn(name:"condition_id", referencedColumnName:"id")]
    private ResumeCondition $condition;

    public function getId(): ?int
    {
        return $this->id;
    }
}
