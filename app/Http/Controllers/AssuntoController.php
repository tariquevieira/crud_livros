<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAssuntoRequest;
use App\Services\AssuntoService;
use Illuminate\Http\Request;


class AssuntoController extends Controller
{
    public function __construct(
        private AssuntoService $assuntoService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assuntos = $this->assuntoService->listaTodosassuntos();

        return view('assunto.index', [
            'assuntos' => $assuntos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assunto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateAssuntoRequest $request)
    {
        $dados = $request->all();
        $createDto = $this->assuntoService->store($dados['descricao']);

        return view('assunto.edit', [
            'assunto' => $createDto->assunto,
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
    public function edit(string $assunto)
    {
        $assunto = $this->assuntoService->getassunto((int)$assunto);
        return view('assunto.edit', [
            'assunto' => $assunto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateAssuntoRequest $request, string $assunto)
    {
        $dados = $request->all();
        $updateDto = $this->assuntoService->update((int)$assunto, $dados['descricao']);

        return view('assunto.edit', [
            'assunto' => $updateDto->assunto,
            'updated' => $updateDto->status,
            'message' => $updateDto->mensagem
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $assunto)
    {
        $deleted = $this->assuntoService->delete((int)$assunto);

        if ($deleted) {
            return $this->index();
        }
    }
}
