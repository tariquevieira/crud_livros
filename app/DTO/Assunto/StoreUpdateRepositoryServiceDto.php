<?php

namespace App\DTO\Assunto;

use App\Models\Assunto;

class StoreUpdateRepositoryServiceDto
{

    public readonly bool $status;
    public readonly ?Assunto $assunto;
    public readonly ?string $mensagem;

    public function __construct(bool $status = false, Assunto $assunto=null, string $mensagem = null)
    {
        $this->status = $status;
        $this->assunto = $assunto;
        $this->mensagem = $mensagem;
    }
}
