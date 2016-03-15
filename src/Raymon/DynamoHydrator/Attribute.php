<?php
namespace Raymon\DynamoHydrator;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 * @Annotation\Target({"PROPERTY"})
 */
class Attribute extends Annotation
{
    public $name;
}