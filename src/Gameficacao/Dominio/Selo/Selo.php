<?php

namespace Alura\Arquitetura\Gameficacao\Dominio\Selo;

use Alura\Arquitetura\Shared\Dominio;

class Selo
{
    /**
     * cpf
     *
     * @var Cpf
     */
    private $cpf;
    /**
     * @var string
     */
    private $nome;

    public function __construct(Cpf $cpf, $nome)
    {
        $this->setCpf($cpf)
            ->setNome($nome);
    }

    /**
     * Get cpf
     *
     * @return  Cpf
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set cpf
     *
     * @param  Cpf  $cpf  cpf
     *
     * @return  self
     */
    public function setCpf(Cpf $cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of nome
     *
     * @return  string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @param  string  $nome
     *
     * @return  self
     */
    public function setNome(string $nome)
    {
        $this->nome = $nome;

        return $this;
    }
}
