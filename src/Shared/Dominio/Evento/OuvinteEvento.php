<?php

namespace Alura\Arquitetura\Shared\Dominio\Evento;

abstract class OuvinteEvento
{
    public function processa(EventoInterface $evento): void
    {
        if ($this->sabeProcessar($evento)) {
            $this->reageAo($evento);
        }
    }

    abstract public function sabeProcessar(EventoInterface $evento): bool;
    abstract public function reageAo(EventoInterface $evento): void;

}
