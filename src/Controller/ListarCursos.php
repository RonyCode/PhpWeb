<?php

namespace Alura\Phpweb\Controller;

use Alura\Phpweb\Entity\Curso;
use Alura\Phpweb\Infra\EntityManagerCreator;
use Alura\Phpweb\Controller\InterfaceControlaRequisicao;

class ListarCursos implements InterfaceControlaRequisicao
{
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
        $cursos = $this->repositorioDeCursos->findAll();
        $titulo = 'Lista de Curso';
        require __DIR__ . '/../../view/cursos/listar-cursos.php';
    }
}
