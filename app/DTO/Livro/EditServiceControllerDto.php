<?php

namespace App\DTO\Livro;

use App\Models\Livro;

class EditServiceControllerDto
{
    public readonly bool $status;
    public readonly ?Livro $livro;
    public readonly ?array $autores;
    public readonly ?array $assuntos;
    public readonly ?string $mensagem;

    public function __construct(
        bool $status,
        ?Livro $livro,
        ?array $autores = null,
        ?array $assuntos = null,
        ?string $mensagem = null
    ) {
        $this->status = $status;
        $this->livro = $livro;
        $this->mensagem = $mensagem;
        $this->autores = $autores;
        $this->assuntos = $assuntos;
    }
}
