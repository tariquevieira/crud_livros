<?php

namespace App\Repositories;

use App\DTO\Autor\StoreUpdateRepositoryServiceDto;
use App\Exceptions\Handler\QueryExceptionHandler;
use App\Models\Autor;
use App\Repositories\Interfaces\AutorRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;

class AutorRepository implements AutorRepositoryInterface
{

    public function __construct(
        private Autor $autor
    ) {
    }

    public function listaTodosAutores(): Collection
    {
        return $this->autor->all();
    }

    public function getAutor(int $codAu): Autor
    {
        return $this->autor->find($codAu);
    }

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
}
