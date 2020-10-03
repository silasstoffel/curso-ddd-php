<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoRepositoryInterface;
use Alura\Arquitetura\Shared\Dominio;

class AlunoRepository implements AlunoRepositoryInterface
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    public function adicionar(Aluno $aluno)
    {
        $sql  = 'INSERT INTO alunos VALUES(:cpf, :nome, :email)';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':cpf', $aluno->cpf());
        $stmt->bindValue(':nome', $aluno->nome());
        $stmt->bindValue(':email', $aluno->email());
        $stmt->execute();

        $sql  = 'INSERT INTO telefones VALUES(:ddd, :numero, :cpf_aluno)';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':cpf_aluno', $aluno->cpf());

        foreach ($aluno->telefones() as $telefone) {
            $stmt->bindValue(':numero', $telefone->numero());
            $stmt->bindValue(':ddd', $telefone->ddd());
            $stmt->execute();
        }
    }

    public function buscarPorCpf(CPF $cpf)
    {
        $sql  = 'SELECT * FROM alunos WHERE cpf = :cpf';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->execute();
        $resultado = $stmt->fetch();

        $aluno = Aluno::criarInstancia(
            $resultado['cpf'],
            $resultado['nome'],
            $resultado['email']
        );

        return $this->recuperarTelefones($aluno);
    }

    /**
     * Recupera todos os alunos
     *
     * @return Alura\Arquitetura\Academico\Aluno\Aluno[]
     */
    public function buscarTodos()
    {
        $alunos     = [];
        $stmt       = $this->conexao->query('SELECT cpf, nome, email FROM alunos');
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultados as $resultado) {
            $aluno = Aluno::criarInstancia(
                $resultado['cpf'],
                $resultado['nome'],
                $resultado['email']
            );
            // Busca os telefone e devolve o objeto aluno
            // com a lista de telefones
            $alunos[] = $this->recuperarTelefones($aluno);
        }
        return $alunos;
    }

    /**
     * Recupera telefone do aluno e adicina no objeto
     *
     * @param Alura\Arquitetura\Academico\Aluno\Aluno $aluno
     * @return Alura\Arquitetura\Academico\Aluno\Aluno
     */
    private function recuperarTelefones(Aluno $aluno)
    {
        $sql  = 'SELECT * FROM telefones WHERE cpf_aluno = :cpf';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':cpf', $aluno->cpf());
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultados as $resultado) {
            $aluno->adicionarTelefone(
                $resultado['ddd'],
                $resultado['numero']
            );
        }
        return $aluno;
    }
}
