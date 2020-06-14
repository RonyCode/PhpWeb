<?php

namespace Alura\Phpweb\Controller;

use Alura\Phpweb\Controller\InterfaceControlaRequisicao;
use Alura\Phpweb\Helper\RenderizadorDeHtmlTrait;

class FormularioDeInsercao implements InterfaceControlaRequisicao
{
    use RenderizadorDeHtmlTrait;

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('cursos/formularios.php', [
            'titulo' => 'Novo curso',
        ]);
    }
}
