<?php
namespace Raymon\DynamoHydrator;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Inflector\Inflector;

class Hydrator
{
    public function hydrate($class, array $data)
    {
        $object     = new $class;
        $reflection = new \ReflectionObject($object);
        $reader     = new AnnotationReader();

        foreach ($reflection->getProperties() as $key => $property) {

            $setter     = sprintf("set%s", ucfirst(Inflector::camelize($property->getName())));
            $annotation = $reader->getPropertyAnnotation($property, "Raymon\\DynamoHydrator\\Attribute");

            if ($annotation === null) {
                continue;
            }
            $object->$setter($data[Inflector::tableize($annotation->name)]);
        }
        return $object;
    }
}