<?php

use Alura\Phpweb\Controller\FormularioDeInsercao;
use Alura\Phpweb\Controller\ListarCursos;
use Alura\Phpweb\Controller\Persistencia;

return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioDeInsercao::class,
    '/salvar-curso' => Persistencia::class,
];
