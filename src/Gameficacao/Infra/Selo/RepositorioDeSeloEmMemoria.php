<?php

namespace Alura\Arquitetura\Gameficacao\Infra\Selo;

use Alura\Arquitetura\Shared\Dominio\Cpf;
use Alura\Arquitetura\Gameficacao\Dominio\Selo\RepositorioDeSelo;
use Alura\Arquitetura\Gameficacao\Dominio\Selo\Selo;

class RepositorioDeSeloEmMemoria implements RepositorioDeSelo
{
    private $selos = [];

    public function adiciona(Selo $selo): void
    {
        $this->selos[] = $selo;
    }

    public function selosAlunoComCpf(Cpf $cpf)
    {
        return array_values(
            array_filter($this->selos, function ($selo) use ($cpf) {
                return $selo->cpfAluno() == $cpf;
            })
        );
    }
}
