<?php

namespace App\Repositories;

use App\DTO\Autor\StoreUpdateRepositoryServiceDto;
use App\Exceptions\Handler\QueryExceptionHandler;
use App\Models\Autor;
use App\Repositories\Interfaces\AutorRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as CollectionQueryBuilder;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class AutorRepository implements AutorRepositoryInterface
{

    public function __construct(
        private Autor $autor
    ) {
    }

    /**
     *
     * @return Collection
     */
    public function listaTodosAutores(): Collection
    {
        return $this->autor->all();
    }

    /**
     *
     * @param integer $codAu
     * @return Autor
     */
    public function getAutor(int $codAu): Autor
    {
        return $this->autor->find($codAu);
    }

    /**
     *
     * @param integer $codAu
     * @param string $nome
     * @return StoreUpdateRepositoryServiceDto
     */
    public function update(int $codAu, string $nome): StoreUpdateRepositoryServiceDto
    {
        try {
            $autor = $this->autor->findOrFail($codAu);
            $autor->nome = $nome;

            $dto = new StoreUpdateRepositoryServiceDto($autor->save(), $autor);

            return $dto;
        } catch (QueryException $e) {
            return new StoreUpdateRepositoryServiceDto(false, null, $e->getMessage());
        } catch (\Exception $e) {
            return new StoreUpdateRepositoryServiceDto(false, null, $e->getMessage());
        }
    }

    /**
     *
     * @param string $nome
     * @return StoreUpdateRepositoryServiceDto
     */
    public function store(string $nome): StoreUpdateRepositoryServiceDto
    {
        try {
            $this->autor->nome = $nome;

            $dto = new StoreUpdateRepositoryServiceDto($this->autor->save(), $this->autor);

            if (!$dto->status) {
                throw new \Exception("Erro desconhecido");
            }

            return $dto;
        } catch (QueryException $e) {
            return new StoreUpdateRepositoryServiceDto(false, null, $e->getMessage());
        } catch (\Exception $e) {
            return new StoreUpdateRepositoryServiceDto(false, null, $e->getMessage());
        }
    }

    /**
     *
     * @param integer $codAu
     * @return StoreUpdateRepositoryServiceDto
     */
    public function delete(int $codAu): StoreUpdateRepositoryServiceDto
    {
        try {
            $autor = $this->autor->findOrFail($codAu);
            $dto = new StoreUpdateRepositoryServiceDto($autor->delete());

            if (!$dto->status) {
                throw new \Exception("Erro desconhecido");
            }

            return $dto;
        } catch (QueryException $e) {
            $message = $e->getMessage();
            if ($e->getCode() === QueryExceptionHandler::INTEGRITY_CONSTRAINT_VIOLATION) {
                $hanlder = new QueryExceptionHandler($e->getCode(), "Autor", "Livro");
                $message = $hanlder->getMessage();
            }

            return new StoreUpdateRepositoryServiceDto(false, null, $message);
        } catch (\Exception $e) {
            return new StoreUpdateRepositoryServiceDto(false, null, $e->getMessage());
        }
    }

    /**
     * Undocumented function
     *
     * @return CollectionQueryBuilder
     */
    public function listaAutoresPorQuantidadeLivros(): CollectionQueryBuilder
    {
        return DB::table('autor')
            ->join('livro_autor', 'autor.codAu', '=', 'livro_autor.autor_codAu')
            ->join('livro', 'livro_autor.livro_codl', '=', 'livro.codl')
            ->join('livro_assunto', 'livro.codl', '=', 'livro_assunto.livro_codl')
            ->join('assunto', 'livro_assunto.assunto_codAs', '=', 'assunto.codAs')
            ->selectRaw('autor.nome as nome, assunto.descricao as descricao, count(livro.codl) as quantidade_livros')
            ->groupBy('autor.nome', 'assunto.descricao')
            ->orderBy('autor.nome')
            ->orderBy('assunto.descricao')
            ->get();
    }
}
