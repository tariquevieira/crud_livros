<?php

namespace App\Repositories;

use App\DTO\Livro\StoreUpdateFindDto;
use App\DTO\Livro\StoreControllerServiceDto;
use App\Models\Livro;
use App\Repositories\Interfaces\LivroRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class LivroRepository implements LivroRepositoryInterface
{
    public function __construct(
        private Livro $livro
    ) {
    }

    /**
     *
     * @return Collection
     */
    public function listaTodosLivros(): Collection
    {
        return $this->livro->all(['codl', 'titulo']);
    }

    /**
     *
     * @param StoreControllerServiceDto $dto
     * @return StoreUpdateFindDto
     */
    public function store(StoreControllerServiceDto $dto): StoreUpdateFindDto
    {
        try {
            DB::beginTransaction();
            $this->livro->titulo = $dto->titulo;
            $this->livro->editora = $dto->editora;
            $this->livro->edicao = $dto->edicao;
            $this->livro->anoPublicacao = $dto->anoPub;
            $salvado = $this->livro->save();

            if (!$salvado) {
                throw new \Exception("Erro ao salvar Livro");
            }

            $this->livro->autores()->attach($dto->autores);
            $this->livro->assuntos()->attach($dto->assuntos);
            DB::commit();
            return new StoreUpdateFindDto(true, $this->livro);
        } catch (\Exception $e) {
            DB::rollBack();
            return new StoreUpdateFindDto(
                status: false,
                mensagem: $e->getMessage(),
                livro: null
            );
        }
    }

    /**
     *
     * @param integer $codl
     * @return Livro
     */
    public function find(int $codl): ?Livro
    {
        return $this->livro->with(['autores', 'assuntos'])
            ->where('codl', $codl)
            ->first();
    }

    /**
     * Undocumented function
     *
     * @param Livro $livro
     * @param StoreControllerServiceDto $dto
     * @return StoreUpdateFindDto
     */
    public function update(Livro $livro, StoreControllerServiceDto $dto): StoreUpdateFindDto
    {
        try {
            DB::beginTransaction();
            $livro->titulo = $dto->titulo;
            $livro->editora = $dto->editora;
            $livro->edicao = $dto->edicao;
            $livro->anoPublicacao = $dto->anoPub;
            $atualizado = $livro->save();

            if (!$atualizado) {
                throw new \Exception("Erro ao salvar Livro");
            }

            $livro->autores()->sync($dto->autores);
            $livro->assuntos()->sync($dto->assuntos);
            DB::commit();
            return new StoreUpdateFindDto(true, $livro);
        } catch (\Exception $e) {
            DB::rollBack();
            return new StoreUpdateFindDto(
                status: false,
                mensagem: $e->getMessage(),
                livro: null
            );
        }
    }

    /**
     *
     * @param Livro $livro
     * @return StoreUpdateFindDto
     */
    public function delete(Livro $livro): StoreUpdateFindDto
    {
        try {
            DB::beginTransaction();

            $livro->autores()->detach();
            $livro->assuntos()->detach();
            $deletado = $livro->delete();

            if (!$deletado) {
                throw new \Exception("Erro ao deletar livro");
            }

            DB::commit();
            return new StoreUpdateFindDto(true);
        } catch (\Exception $e) {
            DB::rollBack();
            return new StoreUpdateFindDto(
                status: false,
                mensagem: $e->getMessage(),
                livro: null
            );
        }
    }
}
