<?php

namespace App\Entity;

use App\Repository\ManagerCommunicateRequestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ManagerCommunicateRequestRepository::class)]
class ManagerCommunicateRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
