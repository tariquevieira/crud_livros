<?php

namespace App\DTO\Livro;

use Illuminate\Database\Eloquent\Collection;

class CreateServiceControllerDto
{

    public readonly Collection $autores;
    public readonly Collection $assuntos;
    public readonly bool $existeAutores;
    public readonly bool $existeAssuntos;

    public function __construct(
        Collection $autores,
        Collection $assuntos,
        bool $existeAutores,
        bool $existeAssuntos
    ) {
        $this->autores = $autores;
        $this->assuntos = $assuntos;
        $this->existeAutores = $existeAutores;
        $this->existeAssuntos = $existeAssuntos;
    }
}
