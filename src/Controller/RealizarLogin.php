<?php

namespace Alura\Phpweb\Controller;

use Alura\Phpweb\Entity\Usuario;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Alura\Phpweb\Helper\FlashMessageTrait;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLogin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    /**
     * @var ObjectRepository $repositorioDeUsuario
     */
    private $repositorioDeUsuario;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeUsuario = $entityManager->getRepository(
            Usuario::class
        );
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_var(
            $request->getParsedBody()['email'],
            \FILTER_VALIDATE_EMAIL
        );

        $resposta = new Response(302, ['Location' => '/login']);
        if (\is_null($email) || $email === \false) {
            $this->defineMensagem('danger', 'O e-mail digitado é inválido!');
            return $resposta;
        }

        $senha = \filter_input(\INPUT_POST, 'senha', \FILTER_SANITIZE_STRING);

        /**
         * @var Usuario $usuario
         */
        $usuario = $this->repositorioDeUsuario->findOneBy(['email' => $email]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $this->defineMensagem('danger', 'E-mail ou senha inexistentes.');

            return $resposta;
        }
        $_SESSION['logado'] = \true;

        return new Response(302, ['Location' => '/listar-cursos']);
    }
}
