<?php

namespace App\Entity;

use Prolyfix\SymfonyComplexIndexRelationBundle\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\MulEntRelTrait;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    use MulEntRelTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


}
