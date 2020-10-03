<?php

namespace App\Infra\Indicacao;

use Alura\Arquitetura\Academico\Aplicacao\Indicacao\EmailInterface;
use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use PHPMailer\PHPMailer\PHPMailer;

class EmailPHPMailer implements EmailInterface
{
    /**
     * Enviar e-mail para indicado
     * @param  Alura\Arquitetura\Academico\Dominio\Aluno\Aluno $alunoIndicado
     * @return void
     */
    public function enviar(Aluno $alunoIndicado)
    {
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //Server settings
        $mail->CharSet   = 'UTF-8';
        $mail->Timeout   = 30;
        $mail->SMTPDebug = 0; // Enable verbose debug output
        $mail->isSMTP(); // Send using SMTP
        $mail->Host       = 'smtp.mailtrap.io'; // Set the SMTP server to send through
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = '80c2baec7597bd'; // SMTP username
        $mail->Password   = '1b72715d2b26d2'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 2525; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $mail->setFrom('escola@online.com.br', 'Escola Online');

        $mail->addAddress($alunoIndicado->email(), $alunoIndicado->nome()); // Add a recipient

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Indicação';
        $mail->Body    = '<b>Olá, você foi indicado</b>';
        $mail->send();

    }
}
