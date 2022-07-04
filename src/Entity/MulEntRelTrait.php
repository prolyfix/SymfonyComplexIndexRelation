<?php
namespace Prolyfix\SymfonyComplexIndexRelationBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


trait MulEntRelTrait{

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $ref;

    #[ORM\Column(type: 'integer', nullable: true)]
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $refId;

    private $entity;

    public function setEntity($entity){
        $this->ref = get_class($entity);
        $this->refId = $entity->getId();
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(?string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getRefId(): ?int
    {
        return $this->refId;
    }

    public function setRefId(?int $refId): self
    {
        $this->refId = $refId;

        return $this;
    }
}
