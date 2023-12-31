<?php

namespace App\Services;

use App\DTO\Autor\StoreUpdateServiceControllerDto;
use App\Models\Autor;
use App\Repositories\Interfaces\AutorRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AutorService
{
    public function __construct(
        private AutorRepositoryInterface $autorRepository
    ) {
    }

    /**
     * Lida com retorno de todos autores
     *
     * @return Collection
     */
    public function listaTodosAutores(): Collection
    {
        $autores = $this->autorRepository->listaTodosAutores();
        return $autores;
    }

    /**
     * Lida com retorno de um autor
     *
     * @param integer $codAu
     * @return Autor
     */
    public function getAutor(int $codAu): Autor
    {
        $autor = $this->autorRepository->getAutor($codAu);
        return $autor;
    }

    /**
     * Lida com a atualização autor
     *
     * @param integer $codAu
     * @param string $nome
     * @return StoreUpdateServiceControllerDto
     */
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

    /**
     * Lida com a inserção autor
     *
     * @param string $nome
     * @return StoreUpdateServiceControllerDto
     */
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

    /**
     *  Lida com deleção de Autor
     *
     * @param integer $codAu
     * @return StoreUpdateServiceControllerDto
     */
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
