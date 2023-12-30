<?php

namespace App\DTO\Livro;

class StoreControllerServiceDto
{

    public readonly string $titulo;
    public readonly string $editora;
    public readonly int    $edicao;
    public readonly string $anoPub;
    public readonly array  $autores;
    public readonly array  $assuntos;
    public readonly ?int    $codl;


    public function __construct(
        string $titulo,
        string $editora,
        int $edicao,
        string $anoPub,
        array $autores,
        array $assuntos,
        ?int  $codl = null
    ) {
        $this->titulo = $titulo;
        $this->editora = $editora;
        $this->edicao = $edicao;
        $this->anoPub = $anoPub;
        $this->autores = $autores;
        $this->assuntos = $assuntos;
        $this->codl = $codl;
    }
}
