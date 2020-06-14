<?php

use Alura\Phpweb\Controller\{
    Deslogar,
    Exclusao,
    FormularioDeEdicao,
    FormularioDeInsercao,
<<<<<<< HEAD
    FormularioLogin,
=======
    Formulariologin,
>>>>>>> 9fcd2639307468b1081735342edcb519aadef704
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
<<<<<<< HEAD
    '/login' => FormularioLogin::class,
=======
    '/login' => Formulariologin::class,
    '/realiza-login' => RealizarLogin::class,
    '/logout' => Deslogar::class,
>>>>>>> 9fcd2639307468b1081735342edcb519aadef704
];
