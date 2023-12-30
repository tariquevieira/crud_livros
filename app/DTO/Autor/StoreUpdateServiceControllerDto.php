<?php

namespace App\DTO\Autor;

use App\Models\Autor;

class StoreUpdateServiceControllerDto
{
    public readonly bool $status;
    public readonly ?Autor $autor;
    public readonly string $mensagem;

    public function __construct(
        bool $status = false,
        string $mensagem = '',
        ?Autor $autor = null
    ) {
        $this->status = $status;
        $this->autor = $autor;
        $this->mensagem = $mensagem;
    }
}
