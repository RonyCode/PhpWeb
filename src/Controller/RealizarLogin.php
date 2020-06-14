<?php

namespace Alura\Phpweb\Controller;

use Alura\Phpweb\Entity\Usuario;
use Alura\Phpweb\Infra\EntityManagerCreator;

class RealizarLogin implements InterfaceControlaRequisicao
{
    private $repositorioDeUsuarios;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeUsuarios = $entityManager->getRepository(
            Usuario::class
        );
    }

    public function processaRequisicao(): void
    {
        $email = \filter_input(\INPUT_POST, 'email', \FILTER_VALIDATE_EMAIL);

        if (\is_null($email) || $email === \false) {
            $_SESSION['tipo_mensagem'] = 'danger';
            $_SESSION['mensagem'] = 'O e-mail digitado é inválido!';
            \header('Location: /login');
            return;
        }
        $senha = \filter_input(\INPUT_POST, 'senha', \FILTER_SANITIZE_STRING);
        /**
         * @var Usuario $usuario
         */
        $usuario = $this->repositorioDeUsuarios->findOneBy(['email' => $email]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $_SESSION['tipo_mensagem'] = 'danger';
            $_SESSION['mensagem'] = 'E-mail ou senha inexistentes.';
            \header('Location: /login');
            return;
        }
        $_SESSION['logado'] = \true;
        \header('Location: /listar-cursos');
    }
}
