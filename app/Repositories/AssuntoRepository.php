<?php

namespace App\Repositories;

use App\DTO\Assunto\StoreUpdateRepositoryServiceDto;
use App\Models\Assunto;
use App\Repositories\Interfaces\AssuntoRepositoryInterface;

class AssuntoRepository implements AssuntoRepositoryInterface
{

    public function __construct(
        private Assunto $assunto
    ) {
    }

    public function listaTodosassuntos()
    {
        return $this->assunto->all();
    }

    public function getassunto(int $codAs)
    {
        return $this->assunto->find($codAs);
    }

    public function update(int $codAs, string $descricao)
    {
        $assunto = $this->assunto->findOrFail($codAs);
        $assunto->descricao = $descricao;

        $updateDto = new StoreUpdateRepositoryServiceDto($assunto->save(), $assunto);

        return $updateDto;
    }

    public function store(string $descricao)
    {

        $this->assunto->descricao = $descricao;

        $storeDto = new StoreUpdateRepositoryServiceDto($this->assunto->save(), $this->assunto);

        return $storeDto;
    }

    public function delete(int $codAs)
    {
        $assunto = $this->assunto->findOrFail($codAs);
        return $assunto->delete();
    }
}
