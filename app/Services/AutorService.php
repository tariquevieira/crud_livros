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

    public function update(int $codAu, string $nome): StoreUpdateServiceControllerDto
    {
        $dto = $this->autorRepository->update($codAu, $nome);

        if ($dto->status) {
            return new StoreUpdateServiceControllerDto(
                $dto->status,
                "Autor atualizado com sucesso!!!",
                $dto->autor
            );
        }

        return new StoreUpdateServiceControllerDto(
            $dto->status,
            $dto->mensagem,
            $this->getAutor($codAu)
        );
    }

    public function store(string $nome): StoreUpdateServiceControllerDto
    {
        $dto = $this->autorRepository->store($nome);

        if ($dto->status) {
            return new StoreUpdateServiceControllerDto(
                $dto->status,
                "Autor criado com sucesso!!!",
                $dto->autor
            );
        }

        return new StoreUpdateServiceControllerDto(
            $dto->status,
            $dto->mensagem,
            $dto->autor
        );
    }

    public function delete(int $codAu): StoreUpdateServiceControllerDto
    {
        $dto = $this->autorRepository->delete($codAu);

        if ($dto->status) {
            return new StoreUpdateServiceControllerDto(
                $dto->status,
                "Autor criado com sucesso!!!",
                $dto->autor
            );
        }

        return new StoreUpdateServiceControllerDto(
            $dto->status,
            $dto->mensagem,
            null
        );
    }
}
