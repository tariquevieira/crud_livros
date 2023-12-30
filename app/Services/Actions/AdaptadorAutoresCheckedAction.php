<?php

namespace App\Services\Actions;

use App\Repositories\AutorRepository;
use Illuminate\Database\Eloquent\Collection;

class AdaptadorAutoresCheckedAction
{
    public function __construct(
        private AutorRepository $autorRepository
    ) {
    }

    public function execute(Collection $autoresRelacionadoLivro): array
    {
        $autores = $this->autorRepository->listaTodosAutores();
        $autoresLivro = $autoresRelacionadoLivro->map(fn ($autor) =>  $autor->codAu);
        $autoresAdaptados = [];

        foreach ($autores as $autor) {
            if ($autoresLivro->contains($autor->codAu)) {
                $autoresAdaptados[] = [
                    'codAu' => $autor->codAu,
                    'nome' => $autor->nome,
                    'checked' => true
                ];
            } else {
                $autoresAdaptados[] = [
                    'codAu' => $autor->codAu,
                    'nome' => $autor->nome,
                    'checked' => false
                ];
            }
        }

        return $autoresAdaptados;
    }
}
