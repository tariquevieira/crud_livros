<?php

namespace App\Services\Actions;

use App\DTO\Livro\StoreUpdateFindDto;
use App\DTO\Livro\StoreControllerServiceDto;
use App\Repositories\LivroRepository;

class LivroStoreAction
{
    public function __construct(
        private LivroRepository $repository
    ) {
    }

    public function execute(StoreControllerServiceDto $dto)
    {
        try {
            return $this->repository->store($dto);
        } catch (\Throwable $th) {
            return new StoreUpdateFindDto(
                status: false,
                mensagem: $th->getMessage(),
                livro: null
            );
        }
    }
}
