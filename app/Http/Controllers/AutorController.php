<?php

namespace App\Http\Controllers;

use App\DTO\Autor\StoreUpdateServiceControllerDto;
use App\Http\Requests\StoreUpdateAutorRequest;
use App\Services\AutorService;

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
    public function store(StoreUpdateAutorRequest $request)
    {
        $dados = $request->all();
        $result = $this->autorService->store($dados['nome']);
        return $this->lidaRedirect($result);
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
    public function update(StoreUpdateAutorRequest $request, string $autor)
    {
        $dados = $request->all();
        $result = $this->autorService->update((int)$autor, $dados['nome']);
        return $this->lidaRedirect($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $autor)
    {
        $result = $this->autorService->delete((int)$autor);

        return $this->lidaRedirect($result);
    }

    private function lidaRedirect(StoreUpdateServiceControllerDto $result)
    {

        if ($result->status) {
            return redirect()->route('autor.index')->with('success', $result->mensagem);
        }

        return redirect()->back()->withErrors(['error' => $result->mensagem]);
    }
}
