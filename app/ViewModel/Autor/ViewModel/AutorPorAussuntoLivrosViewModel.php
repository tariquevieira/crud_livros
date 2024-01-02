<?php

namespace App\ViewModel\Autor\ViewModel;

class AutorPorAussuntoLivrosViewModel
{
    /**
     * Transforma arrary em agrupamento de autores
     *
     * @param array $result
     * @return array
     */
    public function agrupaArrayPorAutor(array $result): array
    {
        $resultMapeado = [];
        $nome = null;

        foreach ($result as $item) {
            if ($item->nome !== $nome) {
                $nome = $item->nome;
                $mapeados = array_filter($result, function ($value) use ($nome) {
                    return $value->nome === $nome;
                });
                $resultMapeado[$nome] = $mapeados;
            }
        }
        return $resultMapeado;
    }
}
