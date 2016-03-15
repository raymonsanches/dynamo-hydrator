<?php
namespace Raymon\DynamoHydrator;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Inflector\Inflector;

class Hydrator
{
    public function hydrate($object, array $data)
    {
        $reflection = new \ReflectionObject($object);
        $reader     = new AnnotationReader();

        foreach ($reflection->getProperties() as $key => $property) {
            $setter     = sprintf("set%s", ucfirst(Inflector::camelize($property->getName())));
            $annotation = $reader->getPropertyAnnotation($property, "Raymon\\DynamoHydrator\\Annotation\\Attribute");

            if (isset($annotation) && $annotation !== null) {

                if (!isset($data[Inflector::tableize($annotation->name)])) {
                    continue;
                }
                $values     = $data[Inflector::tableize($annotation->name)];
                $itemValue  = "";

                if (key($values) ==  "M") {
                    $setter    = sprintf("add%s", ucfirst(Inflector::singularize(Inflector::camelize($property->getName()))));
                    $arrayMap  = $values[key($values)];

                    foreach ($arrayMap as $itemKey => $itemValue) {
                        $object->$setter($itemKey, $itemValue[key($itemValue)]);
                    }
                    continue;
                }

                if (key($values) == "N") {
                    $itemValue = (int) $values[key($values)];
                } elseif (key($values) == "S") {
                    $itemValue = (string) $values[key($values)];
                }
                $object->$setter($itemValue);
            }
        }
        return $object;
    }
}