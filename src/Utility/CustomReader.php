<?php
namespace Prolyfix\SymfonyComplexIndexRelationBundle\Utility;

use ReflectionAttribute;

class CustomReader{

    public static function getClassAnnotations(\ReflectionClass $entity):array
    {
        return($entity->getAttributes());
    }

    public static function getClassAnnotation(\ReflectionClass $entity, string $class): ?\ReflectionAttribute
    {
        foreach($entity->getAttributes() as $refAttr ){
            if($refAttr->getName() == $class){
                return $refAttr;
            }
        }
    }

    public static function getMethodAnnotations(\ReflectionMethod $method):array
    {
        return($method->getAttributes());
    }

    public static function getMethodAnnotation(\ReflectionMethod $method, string $class): ?\ReflectionAttribute
    {
        foreach($method->getAttributes() as $refAttr ){
            if($refAttr->getName() == $class){
                return $refAttr;
            }
        }
        return null;
    }

    public static function getPropertyAnnotations(\ReflectionProperty $property):array
    {
        return($property->getAttributes());
    }

    public static function getPropertyAnnotation(\ReflectionProperty $property, string $class): ?\ReflectionAttribute
    {
        foreach($property->getAttributes() as $refAttr ){
            if($refAttr->getName() == $class){
                return $refAttr;
            }
        }
        return null;
    }


}