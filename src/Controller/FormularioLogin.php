<?php

namespace Alura\Phpweb\Controller;

<<<<<<< HEAD
use Alura\Phpweb\Controller\ControllerComHtml;
use Alura\Phpweb\Controller\InterfaceControlaRequisicao;

class FormularioLogin extends ControllerComHtml implements
=======
class Formulariologin extends ControllerComHtml implements
>>>>>>> 9fcd2639307468b1081735342edcb519aadef704
    InterfaceControlaRequisicao
{
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('login/formulario.php', [
            'titulo' => 'Login',
        ]);
    }
}
