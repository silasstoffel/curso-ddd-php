<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Academico\Aluno\CifradorSenhaInterface;

class CifradorSenhaMd5 implements CifradorSenhaInterface
{
    /**
     * Efetua o processo de criptografia/hash da senha
     * @param  string $senha
     * @return string senha criptografada
     */
    public function cifrar(string $senha)
    {
        return md5($senha);
    }

    /**
     * Verifica se uma senha em string confere com a senha cifrada
     *
     * @param  string $senha
     * @param  string $senhaCrifrada
     * @return bool
     */
    public function verificar(string $senha, string $senhaCrifrada)
    {
        return md5($senha) === $senhaCrifrada;
    }
}
