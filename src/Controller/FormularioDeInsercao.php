<?php

namespace Alura\Phpweb\Controller;

use Alura\Phpweb\Controller\InterfaceControlaRequisicao;

class FormularioDeInsercao implements InterfaceControlaRequisicao
{
    public function processaRequisicao(): void
    {
        $titulo = 'Novo Curso';
        require __DIR__ . '/../../view/cursos/formularios.php';
    }
}
