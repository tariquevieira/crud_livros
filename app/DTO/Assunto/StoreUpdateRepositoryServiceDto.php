<?php

namespace App\DTO\Assunto;

use App\Models\Assunto;

class StoreUpdateRepositoryServiceDto
{

    public readonly bool $status;
    public readonly Assunto $assunto;

    public function __construct(bool $status = false, Assunto $assunto)
    {
        $this->status = $status;
        $this->assunto = $assunto;
    }
}
