<?php

namespace Alura\Phpweb\Controller;

use Alura\Phpweb\Helper\RenderizadorDeHtmlTrait;

class Formulariologin implements InterfaceControlaRequisicao
{
    use RenderizadorDeHtmlTrait;

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('login/formulario.php', [
            'titulo' => 'Login',
        ]);
    }
}
