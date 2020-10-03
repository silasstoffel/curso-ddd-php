<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Aluno\AlunoRepositoryInterface;
use App\Dominio\CPF;

class AlunoRepositoryMemoria implements AlunoRepositoryInterface
{
    private $alunos;

    public function adicionar(Aluno $aluno)
    {
        $this->alunos[] = $aluno;
    }

    public function buscarPorCpf(CPF $cpf)
    {
        $alunosFiltrados = array_filter(
            $this->alunos,
            function ($aluno) use ($cpf) {
                return $aluno->cpf() == $cpf;
            }
        );

        if (count($alunosFiltrados) === 0) {
            throw new \Exception('Aluno não encontrado');
        }

        if (count($alunosFiltrados) > 1) {
            throw new \Exception('Aconteceu um problema na aplicação pois o CPF apareceu em mais de uma vez no resultado da busca');
        }

        return $alunosFiltrados[0];
    }

    /**
     * Recupera todos os alunos
     *
     * @return Alura\Arquitetura\Academico\Aluno\Aluno[]
     */
    public function buscarTodos()
    {
        return $this->alunos;
    }

}
