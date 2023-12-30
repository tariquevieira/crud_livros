<?php

namespace App\DTO\Livro;

use App\Models\Livro;

class StoreUpdateFindDto
{
    public readonly bool $status;
    public readonly ?Livro $livro;
    public readonly ?string $mensagem;

    public function __construct(
        bool $status,
        ?Livro $livro = null,
        ?string $mensagem = ''
    ) {
        $this->status = $status;
        $this->livro = $livro;
        $this->mensagem = $mensagem;
    }
}
