<?php

namespace App\Services\Actions;

use App\Repositories\AssuntoRepository;
use Illuminate\Database\Eloquent\Collection;

class AdaptadorAssuntosCheckedAction
{
    public function __construct(
        private AssuntoRepository $assuntoRepository
    ) {
    }

    public function execute(Collection $assuntoRelacionadoLivro): array
    {
        $assuntos = $this->assuntoRepository->listaTodosassuntos();
        $assuntosLivro = $assuntoRelacionadoLivro->map(fn ($assunto) =>  $assunto->codAs);
        $assuntosAdaptados = [];

        foreach ($assuntos as $assunto) {
            if ($assuntosLivro->contains($assunto->codAs)) {
                $assuntosAdaptados[] = [
                    'codAs' => $assunto->codAs,
                    'descricao' => $assunto->descricao,
                    'checked' => true
                ];
            } else {
                $assuntosAdaptados[] = [
                    'codAs' => $assunto->codAs,
                    'descricao' => $assunto->descricao,
                    'checked' => false
                ];
            }
        }

        return $assuntosAdaptados;
    }
}
