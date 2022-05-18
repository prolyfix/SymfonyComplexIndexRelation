<?php

namespace Prolyfix\SymfonyComplexIndexRelationBundle\Annotations;
use Doctrine\Common\Annotations\Annotation;

#[Annotation]
Class ComplexIndex extends Annotation
{
    public $type;

    public $target;

}