<?php

namespace App\Entity;

use App\Repository\ResumeConditionRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResumeConditionRepository::class)]
class ResumeCondition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column]
    private ?int $rank = null;

    #[ORM\Column]
    private ?bool $block = null;

    #[ORM\ManyToOne(targetEntity: ResumeType::class, inversedBy: 'conditions')]
    private ResumeType $resumeType;

    #[ORM\OneToMany(targetEntity: Resume::class, mappedBy: 'condition')]
    private Collection $resumes;

    public function getId(): ?int
    {
        return $this->id;
    }
}
