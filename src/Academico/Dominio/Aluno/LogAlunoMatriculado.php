<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Academico\Dominio\EventoInterface;
use Alura\Arquitetura\Academico\Dominio\OuvinteEvento;

class LogAlunoMatriculado extends OuvinteEvento
{
    /**
     * reageEvento
     *
     * @param AlunoMatriculado $aluno
     * @return void
     */
    public function reageAo(EventoInterface $aluno): void
    {
        fprintf(
            STDERR,
            'Aluno com CPF %s foi criado matriculado na data %s',
            (string) $aluno->cpfAluno(),
            $aluno->momento()->format('Y-m-d H:i:s')
        );
    }

    public function sabeProcessar(EventoInterface $evento): bool
    {
        return $evento instanceof AlunoMatriculado;
    }
}
