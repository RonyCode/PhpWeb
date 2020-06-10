<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Phpweb\Controller\InterfaceControlaRequisicao;

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($caminho, $rotas)) {
    http_response_code(404);
    exit();
}

$classControladora = $rotas[$caminho];
/**
 * @var InterfaceControlaRequisicao $controlador
 */
$controlador = new $classControladora();
$controlador->processaRequisicao();
