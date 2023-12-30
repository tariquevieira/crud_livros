<?php

namespace App\Services;

use App\DTO\Assunto\StoreUpdateServiceControllerDto;
use App\Repositories\AssuntoRepository;

class AssuntoService
{
    public function __construct(
        private AssuntoRepository $assuntoRepository
    ) {
    }

    public function listaTodosassuntos()
    {
        $assuntoes = $this->assuntoRepository->listaTodosassuntos();
        return $assuntoes;
    }

    public function getassunto(int $codAu)
    {
        $assunto = $this->assuntoRepository->getassunto($codAu);
        return $assunto;
    }

    public function update(int $codAu, string $nome)
    {
        $updateDto = $this->assuntoRepository->update($codAu, $nome);

        if ($updateDto->status) {
            return new StoreUpdateServiceControllerDto(
                $updateDto->status,
                "assunto atualizado com sucesso!!!",
                $updateDto->assunto
            );
        }

        return new StoreUpdateServiceControllerDto(
            $updateDto->status,
            "Erro ao atualizar assunto!",
            $this->getassunto($codAu)
        );
    }

    public function store(string $nome)
    {
        $storeDto = $this->assuntoRepository->store($nome);

        if ($storeDto->status) {
            return new StoreUpdateServiceControllerDto(
                $storeDto->status,
                "assunto criado com sucesso!!!",
                $storeDto->assunto
            );
        }

        return new StoreUpdateServiceControllerDto(
            $storeDto->status,
            "Erro ao atualizar assunto!",
            $storeDto->assunto
        );
    }

    public function delete(int $codAu)
    {
        return $this->assuntoRepository->delete($codAu);
    }
}
