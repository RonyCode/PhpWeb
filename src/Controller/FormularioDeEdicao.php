<?php

namespace Alura\Phpweb\Controller;

use Nyholm\Psr7\Response;
use Alura\Phpweb\Entity\Curso;
use Alura\Phpweb\Helper\FlashMessageTrait;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Alura\Phpweb\Infra\EntityManagerCreator;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Alura\Phpweb\Helper\RenderizadorDeHtmlTrait;

class FormularioDeEdicao implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;
    use FlashMessageTrait;

    private $repositorioCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioCursos = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = \filter_var(
            $request->getQueryParams()['id'],
            \FILTER_VALIDATE_INT
        );
        $resposta = new Response(302, ['Location' => '/listar-cursos']);
        if (is_null($id) || $id === false) {
            $this->defineMensagem('danger', 'ID e curso inválido');
            return $resposta;
        }
        $curso = $this->repositorioCursos->find($id);

        $html = $this->renderizaHtml('cursos/formularios.php', [
            'curso' => $curso,
            'titulo' => 'Alterar curso: ' . $curso->getDescricao(),
        ]);

        return new Response(200, [], $html);
    }
}
