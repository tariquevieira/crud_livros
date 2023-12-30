<?php

namespace App\Repositories\Interfaces;

interface AssuntoRepositoryInterface
{
    public function listaTodosassuntos();
    public function getassunto(int $codAs);
    public function update(int $codAs, string $descricao);
}
