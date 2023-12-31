<?php

namespace App\Services;

use App\DTO\Assunto\StoreUpdateServiceControllerDto;
use App\Models\Assunto;
use App\Repositories\AssuntoRepository;
use App\Repositories\Interfaces\AssuntoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AssuntoService
{
    public function __construct(
        private AssuntoRepositoryInterface $assuntoRepository
    ) {
    }

    /**
     * Lida com retorno de todos os assuntos
     *
     * @return Collection
     */
    public function listaTodosassuntos(): Collection
    {
        $assuntoes = $this->assuntoRepository->listaTodosassuntos();
        return $assuntoes;
    }

    /**
     * Lida com o retorno de um assunto
     *
     * @param integer $codAu
     * @return Assunto
     */
    public function getassunto(int $codAu): Assunto
    {
        $assunto = $this->assuntoRepository->getassunto($codAu);
        return $assunto;
    }

    /**
     * Lida com a atualização Assunto
     *
     * @param integer $codAu
     * @param string $nome
     * @return StoreUpdateServiceControllerDto
     */
    public function update(int $codAu, string $nome): StoreUpdateServiceControllerDto
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

    /**
     * Lida com a inserção Assunto
     *
     * @param string $nome
     * @return StoreUpdateServiceControllerDto
     */
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

    /**
     * Lida com deleção de assunto
     *
     * @param integer $codAu
     * @return void
     */
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
