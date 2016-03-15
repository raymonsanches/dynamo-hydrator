<?php
    $loader = require_once 'vendor/autoload.php';

    use Raymon\DynamoHydrator\Hydrator;

    $hydrator = new Hydrator();

    $tool = $hydrator->hydrate(new \Raymon\DynamoHydrator\Entity\Tool(), [
        "color"  => ["S" => "red"],
        "height" => ["S" => "12"]
    ]);

    var_dump($tool);