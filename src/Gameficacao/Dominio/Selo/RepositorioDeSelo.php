<?php

namespace Alura\Arquitetura\Gameficacao\Dominio\Selo;

use Alura\Arquitetura\Shared\Dominio\Cpf;

interface RepositorioDeSelo
{
    public function adiciona(Selo $selo): void;
    public function selosAlunoComCpf(Cpf $cpf);
}
