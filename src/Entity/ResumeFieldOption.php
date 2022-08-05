<?php

namespace App\Entity;

use App\Repository\ResumeFieldOptionRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResumeFieldOptionRepository::class)]
class ResumeFieldOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column]
    private ?int $rank = null;

    #[ORM\ManyToOne(targetEntity: ResumeField::class, inversedBy:"options")]
    #[ORM\JoinColumn(nullable: false, name:"field_id", referencedColumnName:"id")]
    private ?ResumeField $field;

    public function getId(): ?int
    {
        return $this->id;
    }
}
