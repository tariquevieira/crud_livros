<?php

namespace App\Repositories\Interfaces;

use App\DTO\Livro\StoreControllerServiceDto;
use App\DTO\Livro\StoreUpdateFindDto;
use App\Models\Livro;
use Illuminate\Database\Eloquent\Collection;

interface LivroRepositoryInterface
{
    /**
     *
     * @return Collection
     */
    public function listaTodosLivros(): Collection;

    /**
     *
     * @param StoreControllerServiceDto $dto
     * @return StoreUpdateFindDto
     */
    public function store(StoreControllerServiceDto $dto): StoreUpdateFindDto;

    /**
     *
     * @param integer $codl
     * @return Livro
     */
    public function find(int $codl): Livro;

    /**
     *
     * @param Livro $livro
     * @param StoreControllerServiceDto $dto
     * @return StoreUpdateFindDto
     */
    public function update(Livro $livro, StoreControllerServiceDto $dto): StoreUpdateFindDto;

    /**
     *
     * @param Livro $livro
     * @return StoreUpdateFindDto
     */
    public function delete(Livro $livro): StoreUpdateFindDto;
}
