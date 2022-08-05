<?php

namespace App\Entity;

use App\Repository\ResumeFieldRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResumeFieldRepository::class)]
class ResumeField
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $required = null;

    #[ORM\Column]
    private ?bool $multiple = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mask = null;

    #[ORM\Column]
    private ?int $rank = null;

    #[ORM\Column]
    private ?bool $public = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\ManyToOne(targetEntity: ResumeType::class)]
    #[ORM\JoinColumn(nullable: false, name:"resume_type_id", referencedColumnName:"id")]
    private ResumeType $resumeType;

    #[ORM\Column]
    private int $type;

    #[ORM\OneToMany(targetEntity: ResumeFieldOption::class, mappedBy: 'options')]
    private Collection $options;

    public function getId(): ?int
    {
        return $this->id;
    }
}
