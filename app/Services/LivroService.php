<?php

namespace App\Services;

use App\DTO\Livro\CreateServiceControllerDto;
use App\DTO\Livro\EditServiceControllerDto;
use App\DTO\Livro\StoreControllerServiceDto;
use App\DTO\Livro\StoreUpdateFindDto;
use App\Repositories\AssuntoRepository;
use App\Repositories\AutorRepository;
use App\Repositories\Interfaces\AssuntoRepositoryInterface;
use App\Repositories\Interfaces\AutorRepositoryInterface;
use App\Repositories\Interfaces\LivroRepositoryInterface;
use App\Repositories\LivroRepository;
use App\Services\Actions\AdaptadorAssuntosCheckedAction;
use App\Services\Actions\AdaptadorAutoresCheckedAction;
use Illuminate\Database\Eloquent\Collection;

class LivroService
{
    public function __construct(
        private LivroRepositoryInterface $livroRepository,
        private AutorRepositoryInterface $autorRepository,
        private AssuntoRepositoryInterface $assuntoRepository,
        private AdaptadorAutoresCheckedAction $adaptadorAutores,
        private AdaptadorAssuntosCheckedAction $adaptadorAssuntos
    ) {
    }

    /**
     *Lida com retorno de todos livros
     *
     * @return Collection
     */
    public function listatodosLivros(): Collection
    {
        return $this->livroRepository->listatodosLivros();
    }

    /**
     * Lida com dados para criação de novo livro
     *
     * @return CreateServiceControllerDto
     */
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

    /**
     *  Lida com a inserção de livro
     *
     * @param StoreControllerServiceDto $dto
     * @return StoreUpdateFindDto
     */
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

    /**
     * Lida com busca de um livro
     *
     * @param integer $codl
     * @return StoreUpdateFindDto
     */
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

    /**
     * Lida com dados para edição de um livro
     *
     * @param integer $codl
     * @return EditServiceControllerDto
     */
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

    /**
     * Lida com atualização de livros
     *
     * @param StoreControllerServiceDto $dto
     * @return StoreUpdateFindDto
     */
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

        $result = $this->livroRepository->update($result->livro, $dto);

        if ($result->status) {
            return new StoreUpdateFindDto(
                status: true,
                mensagem: "Livro atualizado!",
                livro: null,
            );
        }
    }

    /**
     * Lida com a deleção de livros
     *
     * @param integer $codl
     * @return StoreUpdateFindDto
     */
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

        $result = $this->livroRepository->delete($result->livro);

        if ($result->status) {
            return new StoreUpdateFindDto(
                status: true,
                mensagem: "Livro deletado com sucesso!",
                livro: null,
            );
        }

        return new StoreUpdateFindDto(
            status: false,
            mensagem: $result->mensagem,
            livro: null,
        );
    }
}
