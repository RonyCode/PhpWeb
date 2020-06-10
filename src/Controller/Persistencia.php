<?php

namespace Alura\Phpweb\Controller;

use Alura\Phpweb\Controller\InterfaceControlaRequisicao;
use Alura\Phpweb\Entity\Curso;
use Alura\Phpweb\Infra\EntityManagerCreator;

class Persistencia implements InterfaceControlaRequisicao
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $descricao = \filter_input(
            \INPUT_POST,
            'descricao',
            \FILTER_SANITIZE_STRING
        );
        $curso = new Curso();
        $curso->setDescricao($descricao);
        $this->entityManager->persist($curso);
        $this->entityManager->flush();

        \header('Location: /listar-cursos', true, 302);
    }
}
