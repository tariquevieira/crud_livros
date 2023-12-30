<?php

namespace App\Services;

use App\DTO\Autor\StoreUpdateServiceControllerDto;
use App\Repositories\AutorRepository;

class AutorService
{
    public function __construct(
        private AutorRepository $autorRepository
    ) {
    }

    public function listaTodosAutores()
    {
        $autores = $this->autorRepository->listaTodosAutores();
        return $autores;
    }

    public function getAutor(int $codAu)
    {
        $autor = $this->autorRepository->getAutor($codAu);
        return $autor;
    }

    public function update(int $codAu, string $nome)
    {
        $updateDto = $this->autorRepository->update($codAu, $nome);

        if ($updateDto->status) {
            return new StoreUpdateServiceControllerDto(
                $updateDto->status,
                "Autor atualizado com sucesso!!!",
                $updateDto->autor
            );
        }

        return new StoreUpdateServiceControllerDto(
            $updateDto->status,
            "Erro ao atualizar autor!",
            $this->getAutor($codAu)
        );
    }

    public function store(string $nome)
    {
        $storeDto = $this->autorRepository->store($nome);

        if ($storeDto->status) {
            return new StoreUpdateServiceControllerDto(
                $storeDto->status,
                "Autor criado com sucesso!!!",
                $storeDto->autor
            );
        }

        return new StoreUpdateServiceControllerDto(
            $storeDto->status,
            "Erro ao atualizar autor!",
            $storeDto->autor
        );
    }

    public function delete(int $codAu)
    {
        return $this->autorRepository->delete($codAu);
    }
}
