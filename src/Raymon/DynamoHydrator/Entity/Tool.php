<?php
namespace Raymon\DynamoHydrator\Entity;

use Raymon\DynamoHydrator\Annotation\Attribute;

class Tool
{
    /**
     * @Attribute(name="color", type="string")
     */
    protected $color;

    /**
     * @Attribute(name="height", type="string")
     */
    protected $height;

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }
}