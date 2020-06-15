<?php

namespace Alura\Phpweb\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Alura\Phpweb\Helper\RenderizadorDeHtmlTrait;

class FormularioDeInsercao implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('cursos/formularios.php', [
            'titulo' => 'Novo curso',
        ]);
        return new Response(200, [], $html);
    }
}
