<?php

namespace Alura\Phpweb\Controller;

class Formulariologin extends ControllerComHtml implements
    InterfaceControlaRequisicao
{
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('login/formulario.php', [
            'titulo' => 'Login',
        ]);
    }
}
