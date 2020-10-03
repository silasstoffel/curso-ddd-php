<?php

namespace Alura\Arquitetura\Academico\Aplicacao\Indicacao;


use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno ;


interface EmailInterface
{
    /**
     * Enviar e-mail para indicado
     * @param  Alura\Arquitetura\Academico\Dominio\Aluno\Aluno  $alunoIndicado
     * @return void
     */
    public function enviar(Aluno $alunoIndicado);
}

