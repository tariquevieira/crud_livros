<?php

namespace App\DTO\Autor;

use App\Models\Autor;

class ServiceControllerDto
{
    public readonly bool $status;
    public readonly ?Autor $autor;
    public readonly ?string $mensagem;

    public function __construct(
        bool $status = false,
        string $mensagem = null,
        ?Autor $autor = null
    ) {
        $this->status = $status;
        $this->autor = $autor;
        $this->mensagem = $mensagem;
    }
}
