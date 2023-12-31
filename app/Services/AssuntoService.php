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
        $dto = $this->assuntoRepository->update($codAu, $nome);

        if ($dto->status) {
            return new StoreUpdateServiceControllerDto(
                $dto->status,
                "assunto atualizado com sucesso!!!",
                $dto->assunto
            );
        }

        return new StoreUpdateServiceControllerDto(
            $dto->status,
            $dto->mensagem,
            $this->getassunto($codAu)
        );
    }

    public function store(string $nome): StoreUpdateServiceControllerDto
    {
        $dto = $this->assuntoRepository->store($nome);

        if ($dto->status) {
            return new StoreUpdateServiceControllerDto(
                $dto->status,
                "assunto criado com sucesso!!!",
                $dto->assunto
            );
        }

        return new StoreUpdateServiceControllerDto(
            $dto->status,
            $dto->mensagem,
            $dto->assunto
        );
    }

    public function delete(int $codAu)
    {
        $dto = $this->assuntoRepository->delete($codAu);

        if ($dto->status) {
            return new StoreUpdateServiceControllerDto(true, "Assunto deletado");
        }

        return new StoreUpdateServiceControllerDto(
            false,
            $dto->mensagem
        );
    }
}
