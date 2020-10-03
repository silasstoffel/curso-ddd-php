<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Shared\Dominio;

interface AlunoRepositoryInterface
{
   public function adicionar(Aluno $aluno);

   /** @return Aluno*/
   public function buscarPorCpf(CPF $aluno);

   /** @return Aluno[] */
   public function buscarTodos();
}
