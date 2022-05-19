<?php
// src/EventListener/DatabaseActivitySubscriber.php
namespace Prolyfix\SymfonyComplexIndexRelationBundle\EventSubscriber;

use Prolyfix\SymfonyComplexIndexRelationBundle\Annotations\ComplexIndex;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\ORM\Events;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Prolyfix\SymfonyComplexIndexRelationBundle\Utility\CustomReader;

class DatabaseActivitySubscriber implements EventSubscriberInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    
    /**
     * @var AnnotationReader
     */
    private $annotationReader;
    
    
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    public function getSubscribedEvents(): array
    {
        return [
            Events::postLoad,
        ];
    }

    // callback methods must be called exactly like the events they listen to;
    // they receive an argument of type LifecycleEventArgs, which gives you access
    // to both the entity object of the event and the entity manager itself
    public function postLoad(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        $refl = new \ReflectionClass($entity);
        foreach( $refl->getProperties() as $property){
            $annotation = CustomReader::getPropertyAnnotation($property,ComplexIndex::class);
            if($annotation!==null){
                $args = $annotation->getArguments();
                switch($args['type']){
                    case 'OneToMany':
                        $newEntities = $this->em->getRepository($args['target'])->findBy(['ref'=> get_class($entity), 'refId' => $entity->getId()]);
                        $name = $property->getName();
                        $function = "set".ucfirst($name);
                        $entity->$function($newEntities);
                        break;
                }
            }
        }
    }


 
}