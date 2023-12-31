<?php

namespace App\Repositories\Interfaces;

use App\DTO\Assunto\StoreUpdateRepositoryServiceDto;
use App\Models\Assunto;
use Illuminate\Database\Eloquent\Collection;

interface AssuntoRepositoryInterface
{
    /**
     *
     * @return Collection
     */
    public function listaTodosassuntos(): Collection;

    /**
     *
     * @param integer $codAs
     * @return Assunto
     */
    public function getassunto(int $codAs): Assunto;

    /**
     *
     * @param integer $codAs
     * @param string $descricao
     * @return StoreUpdateRepositoryServiceDto
     */
    public function update(int $codAs, string $descricao): StoreUpdateRepositoryServiceDto;

    /**
     *
     * @param integer $codAs
     * @return StoreUpdateRepositoryServiceDto
     */
    public function delete(int $codAs): StoreUpdateRepositoryServiceDto;

    /**
     *
     * @param string $descricao
     * @return StoreUpdateRepositoryServiceDto
     */
    public function store(string $descricao): StoreUpdateRepositoryServiceDto;
}
