<?php

namespace Alura\Phpweb\Controller;

use Alura\Phpweb\Entity\Curso;
use Alura\Phpweb\Helper\FlashMessageTrait;
use Alura\Phpweb\Infra\EntityManagerCreator;

class Exclusao implements InterfaceControlaRequisicao
{
    use FlashMessageTrait;
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }
    public function processaRequisicao(): void
    {
        $id = filter_input(\INPUT_GET, 'id', \FILTER_VALIDATE_INT);

        if (is_null($id) || $id === false) {
            header('Location: /listar-cursos');
            return;
        }

        $curso = $this->entityManager->getReference(Curso::class, $id);
        $this->entityManager->remove($curso);
        $this->defineMensagem('warning', 'Curso excluído');
        \header('Location: /listar-cursos');
        $this->entityManager->flush();
        header('Location:/listar-cursos');
    }
}
