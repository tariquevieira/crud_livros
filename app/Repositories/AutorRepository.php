<?php

namespace App\Repositories;

use App\DTO\Autor\StoreUpdateRepositoryServiceDto;
use App\Models\Autor;
use App\Repositories\Interfaces\AutorRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AutorRepository implements AutorRepositoryInterface
{

    public function __construct(
        private Autor $autor
    ) {
    }

    public function listaTodosAutores(): Collection
    {
        return $this->autor->all();
    }

    public function getAutor(int $codAu): Autor
    {
        return $this->autor->find($codAu);
    }

    public function update(int $codAu, string $nome): StoreUpdateRepositoryServiceDto
    {
        $autor = $this->autor->findOrFail($codAu);
        $autor->nome = $nome;

        $updateDto = new StoreUpdateRepositoryServiceDto($autor->save(), $autor);

        return $updateDto;
    }

    public function store(string $nome): StoreUpdateRepositoryServiceDto
    {

        $this->autor->nome = $nome;

        $storeDto = new StoreUpdateRepositoryServiceDto($this->autor->save(), $this->autor);

        return $storeDto;
    }

    public function delete(int $codAu): bool
    {
        $autor = $this->autor->findOrFail($codAu);
        return $autor->delete();
    }
}
