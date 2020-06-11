<?php

namespace Alura\Phpweb\Controller;

use Alura\Phpweb\Controller\InterfaceControlaRequisicao;

class FormularioDeInsercao extends ControllerComHtml implements
    InterfaceControlaRequisicao
{
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('cursos/formularios.php', [
            'titulo' => 'Novo curso',
        ]);
    }
}
