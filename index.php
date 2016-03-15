<?php
    $loader = require_once 'vendor/autoload.php';

    use Raymon\DynamoHydrator\Hydrator;

    $hydrator = new Hydrator();

    $tool = $hydrator->hydrate('Raymon\DynamoHydrator\Entity\Tool', [
        "color" => "red",
        "height" => "12"
    ]);

    var_dump($tool);