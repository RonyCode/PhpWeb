<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Phpweb\Controller\FormularioDeInsercao;
use Alura\Phpweb\Controller\ListarCursos;

// fazer log de todas as requisições
switch ($_SERVER['PATH_INFO']) {
    case '/listar-cursos':
        $controlador = new ListarCursos();
        $controlador->processaRequisicao();
        break;
    case '/novo-curso':
        $controlador = new FormularioDeInsercao();
        $controlador->processaRequisicao();
        break;
    default:
        echo "Erro 404";
        break;
}
