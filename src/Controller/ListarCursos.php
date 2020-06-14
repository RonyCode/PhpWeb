<?php

namespace Alura\Phpweb\Controller;

use Alura\Phpweb\Entity\Curso;
use Alura\Phpweb\Infra\EntityManagerCreator;
use Alura\Phpweb\Controller\InterfaceControlaRequisicao;
use Alura\Phpweb\Helper\RenderizadorDeHtmlTrait;

class ListarCursos implements InterfaceControlaRequisicao
{
    use RenderizadorDeHtmlTrait;

    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(
            Curso::class
        );
    }

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('cursos/listar-cursos.php', [
            'cursos' => $this->repositorioDeCursos->findAll(),
            'titulo' => 'Lista de cursos',
        ]);
    }
}
