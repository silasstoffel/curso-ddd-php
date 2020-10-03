<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Academico\Aluno\CifradorSenhaInterface;

class CifradorSenhaMd5 implements CifradorSenhaInterface
{
    /**
     * Efetua o processo de criptografia/hash de um string
     * @param  string $senha
     * @return string senha criptografada
     */
    public function cifrar(string $senha)
    {
        return password_hash($senha, PASSWORD_ARGON2ID);
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
        return password_verify($senha, $senhaCrifrada);
    }
}
