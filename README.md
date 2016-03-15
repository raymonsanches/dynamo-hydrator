# DynamoDB Hydrator & Mapper

That's a simple implementation of Hydration concept, designed to hydrate and map objects to and from DynamoDB databases.

This is still a work in progress.

# How to use

```
use Raymon\DynamoHydrator\Hydrator;

$hydrator = new Hydrator();

$tool = $hydrator->hydrate(new \Raymon\DynamoHydrator\Entity\Tool(), [
    "color"  => ["S" => "red"],
    "height" => ["S" => "12"]
]);
```