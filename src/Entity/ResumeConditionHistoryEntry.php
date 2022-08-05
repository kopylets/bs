<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\ResumeConditionHistoryEntryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResumeConditionHistoryEntryRepository::class)]
class ResumeConditionHistoryEntry
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: ResumeCondition::class)]
    private ResumeCondition $oldCondition;

    #[ORM\ManyToOne(targetEntity: ResumeCondition::class)]
    private ResumeCondition $newCondition;

    public function getId(): ?int
    {
        return $this->id;
    }
}
