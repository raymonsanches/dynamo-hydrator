<?php
namespace Raymon\DynamoHydrator\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 * @Annotation\Target({"PROPERTY"})
 */
class Attribute extends Annotation
{
    public $name;
    /**
     * @Enum({"string", "number", "array"})
     */
    public $type;
}