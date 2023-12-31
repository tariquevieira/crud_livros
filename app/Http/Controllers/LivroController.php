<?php

namespace App\Http\Controllers;

use App\DTO\Livro\StoreControllerServiceDto;
use App\Http\Requests\StoreUpdateLivroRequest;
use App\Services\LivroService;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function __construct(
        private LivroService $livroService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('livro.index', [
            'livros' => $this->livroService->listatodosLivros()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dto = $this->livroService->lidaDadosNovoLivro();
        $autores = $dto->autores;
        $assuntos = $dto->assuntos;
        $existeAutores = $dto->existeAutores;
        $existeAssuntos = $dto->existeAssuntos;
        return view('livro.create', compact(
            'autores',
            'assuntos',
            'existeAutores',
            'existeAssuntos'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateLivroRequest $request)
    {
        $dto = new StoreControllerServiceDto(
            $request->titulo,
            $request->editora,
            $request->edicao,
            $request->anoPub,
            $request->autores,
            $request->assuntos,
        );

        $result = $this->livroService->store($dto);

        if ($result->status) {
            return redirect()->route('livro.index');
        }

        return redirect()->back()->withErrors(['erro_store' => $result->mensagem]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $codl)
    {
        $result = $this->livroService->find($codl);

        if ($result->status) {
            return view(
                'livro.show',
                [
                    'status' => $result->status,
                    'livro' => $result->livro,
                ]
            );
        }

        return redirect()->back()->withErrors(['erro_store' => $result->mensagem]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $codl)
    {
        $result = $this->livroService->lidaDadosEdicao($codl);

        if ($result->status) {
            return view(
                'livro.edit',
                [
                    'status' => $result->status,
                    'livro' => $result->livro,
                    'autores' => $result->autores,
                    'assuntos' => $result->assuntos
                ]
            );
        }

        return redirect()->back()->withErrors(['erro_store' => $result->mensagem]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateLivroRequest $request, int $codl)
    {
        $dto = new StoreControllerServiceDto(
            $request->titulo,
            $request->editora,
            $request->edicao,
            $request->anoPub,
            $request->autores,
            $request->assuntos,
            (int) $codl
        );
        $result = $this->livroService->update($dto);
        if ($result->status) {
            return redirect()->route('livro.index');
        }

        return redirect()->back()->withErrors(['erro_store' => $result->mensagem]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $codl)
    {
        $result = $this->livroService->delete($codl);
        if ($result->status) {
            return redirect()->route('livro.index');
        }
    }
}
