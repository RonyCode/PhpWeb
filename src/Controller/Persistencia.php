<?php

namespace Alura\Phpweb\Controller;

use Alura\Phpweb\Controller\InterfaceControlaRequisicao;
use Alura\Phpweb\Entity\Curso;
use Alura\Phpweb\Helper\FlashMessageTrait;
use Alura\Phpweb\Infra\EntityManagerCreator;

class Persistencia implements InterfaceControlaRequisicao
{
    use FlashMessageTrait;

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

        $id = filter_input(\INPUT_GET, 'id', \FILTER_VALIDATE_INT);

        if (!is_null($id) && $id !== false) {
            $curso->setId($id);
            $this->entityManager->merge($curso);

            $this->defineMensagem('success', 'Curso atualizado com sucesso!');
        } else {
            $this->entityManager->persist($curso);
            $this->defineMensagem('success', 'Curso inserido com sucesso!');
        }

        $this->entityManager->flush();

        \header('Location: /listar-cursos', true, 302);
    }
}
