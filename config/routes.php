<?php

use Alura\Phpweb\Controller\{
    Exclusao,
    FormularioDeEdicao,
    FormularioDeInsercao,
    FormularioLogin,
    ListarCursos,
    Persistencia
};

return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioDeInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusao::class,
    '/alterar-curso' => FormularioDeEdicao::class,
    '/login' => FormularioLogin::class,
];
