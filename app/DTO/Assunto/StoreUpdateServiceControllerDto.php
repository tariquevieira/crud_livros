<?php

namespace App\DTO\Assunto;

use App\Models\Assunto;

class StoreUpdateServiceControllerDto
{
    public readonly bool $status;
    public readonly ?assunto $assunto;
    public readonly string $mensagem;


    public function __construct(
        bool $status = false,
        string $mensagem = '',
        ?Assunto $assunto = null
    ) {
        $this->status = $status;
        $this->assunto = $assunto;
        $this->mensagem = $mensagem;
    }
}
