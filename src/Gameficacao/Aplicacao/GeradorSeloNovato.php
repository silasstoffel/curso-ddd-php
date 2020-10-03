<?php

namespace Alura\Arquitetura\Gameficacao\Aplicacao;

use Alura\Arquitetura\Shared\Dominio\Evento\EventoInterface;
use Alura\Arquitetura\Shared\Dominio\Evento\OuvinteEvento;
use Alura\Arquitetura\Gameficacao\Dominio\Selo\Selo;
use Alura\Arquitetura\Gameficacao\Dominio\Selo\RepositorioDeSelo;


class GeradorSeloNovato implements OuvinteEvento
{

    /**
     * repositorio
     *
     * @var Alura\Arquitetura\Gameficacao\Dominio\Selo\RepositorioDeSelo;
     */
    private $repositorio;

    public function __construct(RepositorioDeSelo $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function sabeProcessar(EventoInterface $evento)
    {
        return get_class($evento) === 'Alura\Arquitetura\Acamedico\Dominio\Aluno\AlunoMatriculado';
    }

    public function reageAo(EventoInterface $evento): void
    {
        $array = $evento->jsonSerialize();
        $cpf = $array['cpfAluno'];

        $selo = new Selo($cpf);
        $this->repositorio->adicionar();
    }

}
