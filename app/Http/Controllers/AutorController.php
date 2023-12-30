<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AutorService;
use Illuminate\View\View;

class AutorController extends Controller
{
    public function __construct(
        private AutorService $autorService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = $this->autorService->listaTodosAutores();

        return view('autor.index', [
            'autores' => $autores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('autor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $createDto = $this->autorService->store($dados['nome']);

        return view('autor.edit', [
            'autor' => $createDto->autor,
            'updated' => $createDto->status,
            'mensagem' => $createDto->mensagem
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $autor)
    {
        $autor = $this->autorService->getAutor((int)$autor);
        return view('autor.edit', [
            'autor' => $autor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $autor)
    {
        $dados = $request->all();
        $updateDto = $this->autorService->update((int)$autor, $dados['nome']);

        return view('autor.edit', [
            'autor' => $updateDto->autor,
            'updated' => $updateDto->status,
            'message' => $updateDto->mensagem
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $autor)
    {
        $deleted = $this->autorService->delete((int)$autor);

        if ($deleted) {
            return $this->index();
        }
    }
}
