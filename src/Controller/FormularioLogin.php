<?php

namespace Alura\Phpweb\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Alura\Phpweb\Helper\RenderizadorDeHtmlTrait;
use Nyholm\Psr7\Response;

class Formulariologin implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('login/formulario.php', [
            'titulo' => 'Login',
        ]);
        return new Response(200, [], $html);
    }
}
