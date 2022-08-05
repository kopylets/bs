<?php

namespace App\Entity;

use App\Repository\ResumeTypeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResumeTypeRepository::class)]
class ResumeType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $code = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column]
    private ?int $rank = null;

    #[ORM\OneToMany(targetEntity: Resume::class, mappedBy: 'type')]
    private Collection $resumes;

    #[ORM\OneToMany(targetEntity: ResumeField::class, mappedBy: 'resumeType')]
    private Collection $fields;

    #[ORM\OneToMany(targetEntity: ResumeCondition::class, mappedBy: 'resumeType')]
    private Collection $conditions;

    public function getId(): ?int
    {
        return $this->id;
    }
}
