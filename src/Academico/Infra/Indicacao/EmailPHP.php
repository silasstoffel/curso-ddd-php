<?php

namespace App\Infra\Indicacao;

use Alura\Arquitetura\Academico\Aplicacao\Indicacao\EmailInterface;
use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;

class EmailPHP implements EmailInterface
{
    /**
     * Enviar e-mail para indicado
     * @param  Alura\Arquitetura\Academico\Dominio\Aluno\Aluno $alunoIndicado
     * @return void
     */
    public function enviar(Aluno $alunoIndicado)
    {
        $to      = $alunoIndicado->email();
        $subject = 'Indicação';
        $message = 'Olá você foi indicado';
        $headers = 'From: escolaonline@escola.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
    }
}
