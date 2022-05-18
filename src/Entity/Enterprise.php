<?php

namespace Prolyfix\SymfonyComplexIndexRelationBundle\Entity;

use Prolyfix\SymfonyComplexIndexRelationBundle\Repository\EnterpriseRepository;
use Doctrine\ORM\Mapping as ORM;
use Prolyfix\SymfonyComplexIndexRelationBundle\Annotations\ComplexIndex;

#[ORM\Entity(repositoryClass: EnterpriseRepository::class)]
class Enterprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ComplexIndex(type:'OneToMany',target: 'App\Entity\Task')]
    private $mixedIndexTask;

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

    public function getMixedIndexTask()
    {
        return $this->mixedIndexTask;
    }

    public function setMixedIndexTask( $entity):self
    {
        $this->mixedIndexTask = $entity;
        return $this;
    }

}
