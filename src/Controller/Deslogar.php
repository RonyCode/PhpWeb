<?php

namespace Alura\Phpweb\Controller;

class Deslogar implements InterfaceControlaRequisicao
{
    public function processaRequisicao(): void
    {
        \session_destroy();
        \header('Location: /login');
    }
}
