<?php

use Alura\Phpweb\Entity\Curso;
use Alura\Phpweb\Infra\EntityManagerCreator;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerCreator())->getEntityManager();
$repositorioDeCursos = $entityManager->getRepository(Curso::class);
$cursos = $repositorioDeCursos->findAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Listar cursos</h1>
        </div>

        <a href="/novo-curso" class="btn btn-primary mb-2">
            Novo curso
        </a>

        <ul class="list-group">
            <?php foreach ($cursos as $curso): ?>
                <li class="list-group-item">
                    <?= $curso->getDescric() ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>
