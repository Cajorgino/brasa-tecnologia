<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailSender extends Mailable
{
    use Queueable, SerializesModels;

    public $aluno, $mensagem, $professor, $mensagemProfessor;

    public function __construct($aluno, $mensagem, $professor, $mensagemProfessor)
    {
        $this->aluno = $aluno;
        $this->mensagem = $mensagem;
        $this->professor = $professor;
        $this->mensagemProfessor = $mensagemProfessor;

    }

    public function build()
    {
        return $this->subject('Resposta da sua mensagem')
                    ->view('emails.messageReply');
    }
}
