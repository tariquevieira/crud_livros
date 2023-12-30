<?php

namespace App\DTO\Autor;

use App\Models\Autor;

class StoreUpdateRepositoryServiceDto
{

    public readonly bool $status;
    public readonly Autor $autor;

    public function __construct(bool $status = false, Autor $autor)
    {
        $this->status = $status;
        $this->autor = $autor;
    }
}
