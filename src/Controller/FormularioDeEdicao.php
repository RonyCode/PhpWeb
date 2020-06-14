<?php

namespace Alura\Phpweb\Controller;

use Alura\Phpweb\Entity\Curso;
use Alura\Phpweb\Helper\RenderizadorDeHtmlTrait;
use Alura\Phpweb\Infra\EntityManagerCreator;

class FormularioDeEdicao implements InterfaceControlaRequisicao
{
    use RenderizadorDeHtmlTrait;

    private $repositorioCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioCursos = $entityManager->getRepository(Curso::class);
    }
    public function processaRequisicao(): void
    {
        $id = \filter_input(\INPUT_GET, 'id', \FILTER_VALIDATE_INT);
        if (is_null($id) || $id === false) {
            \header('Location: /listar-curso');
            return;
        }
        $curso = $this->repositorioCursos->find($id);
        echo $this->renderizaHtml('cursos/formularios.php', [
            'curso' => $curso,
            'titulo' => 'Alterar curso: ' . $curso->getDescricao(),
        ]);
    }
}
