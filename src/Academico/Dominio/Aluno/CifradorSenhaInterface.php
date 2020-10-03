<?php

namespace Alura\Arquitetura\Academico\Aluno;

interface CifradorSenhaInterface
{
    /**
     * Efetua o processo de criptografia/hash da senha
     * @param  string $senha
     * @return string senha criptografada
     */
    public function cifrar(string $senha);

    /**
     * Verifica se uma senha em string confere com a senha cifrada
     *
     * @param  string $senha
     * @param  string $senhaCrifrada
     * @return bool
     */
    public function verificar(string $senha, string $senhaCrifrada);

}
