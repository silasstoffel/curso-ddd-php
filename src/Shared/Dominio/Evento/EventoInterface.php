<?php

namespace Alura\Arquitetura\Shared\Dominio\Evento;

use JsonSerializable;

interface EventoInterface extends JsonSerializable
{
    public function momento(): \DateTimeImmutable;
}
