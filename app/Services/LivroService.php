<?php

namespace App\Services;

use App\DTO\Livro\CreateServiceControllerDto;
use App\DTO\Livro\EditServiceControllerDto;
use App\DTO\Livro\StoreControllerServiceDto;
use App\DTO\Livro\StoreUpdateFindDto;
use App\Repositories\AssuntoRepository;
use App\Repositories\AutorRepository;
use App\Repositories\LivroRepository;
use App\Services\Actions\AdaptadorAssuntosCheckedAction;
use App\Services\Actions\AdaptadorAutoresCheckedAction;
use Illuminate\Database\Eloquent\Collection;

class LivroService
{
    public function __construct(
        private LivroRepository $livroRepository,
        private AutorRepository $autorRepository,
        private AssuntoRepository $assuntoRepository,
        private AdaptadorAutoresCheckedAction $adaptadorAutores,
        private AdaptadorAssuntosCheckedAction $adaptadorAssuntos
    ) {
    }

    public function listatodosLivros(): Collection
    {
        return $this->livroRepository->listatodosLivros();
    }

    public function lidaDadosNovoLivro(): CreateServiceControllerDto
    {
        $autores = $this->autorRepository->listaTodosAutores();
        $assuntos = $this->assuntoRepository->listaTodosassuntos();

        $existeAutores = count($autores) > 0;
        $existeAssuntos = count($assuntos) > 0;

        $dto = new CreateServiceControllerDto(
            $autores,
            $assuntos,
            $existeAutores,
            $existeAssuntos
        );

        return $dto;
    }

    public function store(StoreControllerServiceDto $dto): StoreUpdateFindDto
    {
        $result = $this->livroRepository->store($dto);

        if ($result->status) {
            return new StoreUpdateFindDto(
                $result->status,
                $result->livro,
                "Livro inserido com sucesso"
            );
        }

        return $result;
    }

    public function find(int $codl): StoreUpdateFindDto
    {
        $livro = $this->livroRepository->find($codl);
        if (empty($livro)) {
            return new StoreUpdateFindDto(
                status: false,
                mensagem: "Livro não encontrado",
                livro: null,
            );
        }

        return new StoreUpdateFindDto(
            status: true,
            livro: $livro,
            mensagem: null,
        );
    }

    public function lidaDadosEdicao(int $codl): EditServiceControllerDto
    {
        $result = $this->find($codl);

        if (!$result->status) {
            return new EditServiceControllerDto(
                status: false,
                mensagem: "Livro não encontrado",
                autores: null,
                assuntos: null,
                livro: null
            );
        }
        $livro = $result->livro;

        $autores = $this->adaptadorAutores->execute($livro->autores);
        $assuntos = $this->adaptadorAssuntos->execute($livro->assuntos);

        return new EditServiceControllerDto(
            status: true,
            mensagem: null,
            autores: $autores,
            assuntos: $assuntos,
            livro: $livro
        );
    }

    public function update(StoreControllerServiceDto $dto): StoreUpdateFindDto
    {
        $result = $this->find($dto->codl);

        if (!$result->status) {
            return new StoreUpdateFindDto(
                status: false,
                mensagem: "Livro não encontrado",
                livro: null,
            );
        }

        return $this->livroRepository->update($result->livro, $dto);
    }

    public function delete(int $codl): StoreUpdateFindDto
    {
        $result = $this->find($codl);

        if (!$result->status) {
            return new StoreUpdateFindDto(
                status: false,
                mensagem: "Livro não encontrado",
                livro: null,
            );
        }

        return new StoreUpdateFindDto(
            status: true,
            mensagem: "Livro deletado com sucesso!",
            livro: null,
        );;
    }
}
