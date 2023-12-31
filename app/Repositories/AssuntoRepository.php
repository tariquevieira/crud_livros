<?php

namespace App\Repositories;

use App\DTO\Assunto\StoreUpdateRepositoryServiceDto;
use App\Exceptions\Handler\QueryExceptionHandler;
use App\Models\Assunto;
use App\Repositories\Interfaces\AssuntoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;

class AssuntoRepository implements AssuntoRepositoryInterface
{

    public function __construct(
        private Assunto $assunto
    ) {
    }

    public function listaTodosassuntos(): Collection
    {
        return $this->assunto->all();
    }

    public function getassunto(int $codAs)
    {
        return $this->assunto->find($codAs);
    }

    public function update(int $codAs, string $descricao)
    {
        try {
            $assunto = $this->assunto->findOrFail($codAs);
            $assunto->descricao = $descricao;

            $dto = new StoreUpdateRepositoryServiceDto($assunto->save(), $assunto);

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

    public function store(string $descricao)
    {
        try {
            $this->assunto->descricao = $descricao;

            $dto = new StoreUpdateRepositoryServiceDto($this->assunto->save(), $this->assunto);

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

    public function delete(int $codAs)
    {
        try {
            $assunto = $this->assunto->findOrFail($codAs);
            $dto = new StoreUpdateRepositoryServiceDto($assunto->delete());

            if (!$dto->status) {
                throw new \Exception("Erro desconhecido");
            }

            return $dto;
        } catch (QueryException $e) {
            $message = $e->getMessage();

            if ($e->getCode() === QueryExceptionHandler::INTEGRITY_CONSTRAINT_VIOLATION) {
                $hanlder = new QueryExceptionHandler($e->getCode(), "Assunto", "Livro");
                $message = $hanlder->getMessage();
            }

            return new StoreUpdateRepositoryServiceDto(false, null, $message);
        } catch (\Exception $e) {
            return new StoreUpdateRepositoryServiceDto(false, null, $e->getMessage());
        }
    }
}
