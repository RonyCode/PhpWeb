<?php

use Alura\Phpweb\Infra\EntityManagerCreator;
use DI\ContainerBuilder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    EntityManagerInterface::class => function () {
        return (new EntityManagerCreator())->getEntityManager();
    },
]);
$container = $containerBuilder->build();
return $container;
