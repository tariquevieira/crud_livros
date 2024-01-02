<?php

namespace App\Services;

use App\DTO\Autor\ServiceControllerDto;
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
    public function getAutor(int $codAu): ServiceControllerDto
    {
        $autor = $this->autorRepository->getAutor($codAu);
        if (empty($autor)) {
            return new ServiceControllerDto(
                false,
                "Autor nao encontrado",
                null
            );
        }

        return new ServiceControllerDto(
            true,
            null,
            $autor
        );;
    }

    /**
     * Lida com a atualização autor
     *
     * @param integer $codAu
     * @param string $nome
     * @return ServiceControllerDto
     */
    public function update(int $codAu, string $nome): ServiceControllerDto
    {
        $dto = $this->autorRepository->update($codAu, $nome);

        if ($dto->status) {
            return new ServiceControllerDto(
                $dto->status,
                "Autor atualizado com sucesso!!!",
                $dto->autor
            );
        }

        return new ServiceControllerDto(
            $dto->status,
            $dto->mensagem,
            $this->getAutor($codAu)
        );
    }

    /**
     * Lida com a inserção autor
     *
     * @param string $nome
     * @return ServiceControllerDto
     */
    public function store(string $nome): ServiceControllerDto
    {
        $dto = $this->autorRepository->store($nome);

        if ($dto->status) {
            return new ServiceControllerDto(
                $dto->status,
                "Autor criado com sucesso!!!",
                $dto->autor
            );
        }

        return new ServiceControllerDto(
            $dto->status,
            $dto->mensagem,
            $dto->autor
        );
    }

    /**
     *  Lida com deleção de Autor
     *
     * @param integer $codAu
     * @return ServiceControllerDto
     */
    public function delete(int $codAu): ServiceControllerDto
    {
        $dto = $this->autorRepository->delete($codAu);

        if ($dto->status) {
            return new ServiceControllerDto(
                $dto->status,
                "Autor criado com sucesso!!!",
                $dto->autor
            );
        }

        return new ServiceControllerDto(
            $dto->status,
            $dto->mensagem,
            null
        );
    }
}
