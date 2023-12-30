<?php

namespace App\Repositories;

use App\DTO\Autor\StoreUpdateRepositoryServiceDto;
use App\Models\Autor;
use App\Repositories\Interfaces\AutorRepositoryInterface;

class AutorRepository implements AutorRepositoryInterface
{

    public function __construct(
        private Autor $autor
    ) {
    }

    public function listaTodosAutores()
    {
        return $this->autor->all();
    }

    public function getAutor(int $codAu)
    {
        return $this->autor->find($codAu);
    }

    public function update(int $codAu, string $nome)
    {
        $autor = $this->autor->findOrFail($codAu);
        $autor->nome = $nome;

        $updateDto = new StoreUpdateRepositoryServiceDto($autor->save(), $autor);

        return $updateDto;
    }

    public function store(string $nome)
    {

        $this->autor->nome = $nome;

        $storeDto = new StoreUpdateRepositoryServiceDto($this->autor->save(), $this->autor);

        return $storeDto;
    }

    public function delete(int $codAu)
    {
        $autor = $this->autor->findOrFail($codAu);
        return $autor->delete();
    }
}
