<?php

namespace App\Entity;

use App\Repository\ResumeFieldValueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResumeFieldValueRepository::class)]
class ResumeFieldValue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $value = null;

    #[ORM\ManyToOne(targetEntity: ResumeField::class)]
    #[ORM\JoinColumn(name:"field_id", referencedColumnName:"id")]
    private ResumeField $field;

    #[ORM\ManyToOne(targetEntity: Resume::class)]
    #[ORM\JoinColumn(name:"resume_id", referencedColumnName:"id")]
    private Resume $resume;

    #[ORM\ManyToOne(targetEntity: ResumeFieldOption::class)]
    #[ORM\JoinColumn(name: "option_id", referencedColumnName: "id", nullable: true)]
    private ?ResumeFieldOption $option;

    #[ORM\OneToOne(targetEntity: Location::class)]
    private Location $location;

    #[ORM\OneToOne(targetEntity: Contact::class)]
    private Contact $contact;

    #[ORM\OneToOne(targetEntity: File::class)]
    private File $file;

    public function getId(): ?int
    {
        return $this->id;
    }
}
