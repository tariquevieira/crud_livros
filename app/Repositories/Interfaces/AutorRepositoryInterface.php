<?php

namespace App\Repositories\Interfaces;

interface AutorRepositoryInterface
{
    public function listaTodosAutores();
    public function getAutor(int $codAutor);
    public function update(int $codAu, string $nome);
}
