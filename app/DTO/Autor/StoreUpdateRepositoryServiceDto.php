<?php

namespace App\DTO\Autor;

use App\Models\Autor;

class StoreUpdateRepositoryServiceDto
{

    public readonly bool $status;
    public readonly ?Autor $autor;
    public readonly ?string $mensagem;

    public function __construct(
        bool $status = false,
        Autor $autor = null,
        $mensagem = null
    ) {
        $this->status = $status;
        $this->autor = $autor;
        $this->mensagem = $mensagem;
    }
}
