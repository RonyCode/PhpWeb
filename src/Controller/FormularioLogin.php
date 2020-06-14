<?php

namespace Alura\Phpweb\Controller;

use Alura\Phpweb\Controller\ControllerComHtml;
use Alura\Phpweb\Controller\InterfaceControlaRequisicao;

class FormularioLogin extends ControllerComHtml implements
    InterfaceControlaRequisicao
{
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('login/formulario.php', [
            'titulo' => 'Login',
        ]);
    }
}
