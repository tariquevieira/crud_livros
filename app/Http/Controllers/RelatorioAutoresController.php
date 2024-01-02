<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\AutorRepositoryInterface;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioAutoresController extends Controller
{
    public function __construct(
        private AutorRepositoryInterface $autorRepository
    ) {
    }

    /**
     * Lida relatorio autor por assunto
     */
    public function autoresPorAssuntoQuantidaLivros()
    {
        $result = $this->autorRepository->viewAutoresPorQuantidadeLivros();
        $data = [];
        $data['result'] = $result->toArray();
        $pdf = Pdf::loadView('autor.relatorios.autor-por-assunto-livros', $data);
        return $pdf->stream();
    }
}
