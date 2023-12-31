<?php

namespace App\Repositories\Interfaces;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Collection;
use App\DTO\Autor\StoreUpdateRepositoryServiceDto;

interface AutorRepositoryInterface
{
    /**
     *
     * @return Collection
     */
    public function listaTodosAutores(): Collection;

    /**
     *
     * @param integer $codAu
     * @return Autor
     */
    public function getAutor(int $codAu): Autor;

    /**
     *
     * @param integer $codAu
     * @param string $nome
     * @return StoreUpdateRepositoryServiceDto
     */
    public function update(int $codAu, string $nome): StoreUpdateRepositoryServiceDto;

    /**
     *
     * @param string $nome
     * @return StoreUpdateRepositoryServiceDto
     */
    public function store(string $nome): StoreUpdateRepositoryServiceDto;

    /**
     *
     * @param integer $codAu
     * @return StoreUpdateRepositoryServiceDto
     */
    public function delete(int $codAu): StoreUpdateRepositoryServiceDto;
}
