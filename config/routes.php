<?php

use Alura\Phpweb\Controller\{
    Deslogar,
    Exclusao,
    FormularioDeEdicao,
    FormularioDeInsercao,
    Formulariologin,
    ListarCursos,
    Persistencia,
    RealizarLogin
};

return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioDeInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusao::class,
    '/alterar-curso' => FormularioDeEdicao::class,
    '/login' => Formulariologin::class,
    '/realiza-login' => RealizarLogin::class,
    '/logout' => Deslogar::class,
];
