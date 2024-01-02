<?php

namespace App\Http\Controllers;

use App\DTO\Assunto\ServiceControllerDto;
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
        $result = $this->assuntoService->store($dados['descricao']);

        return $this->lidaRedirect($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $codAu)
    {
        return redirect()->route('assunto.edit', $codAu);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $codAu)
    {
        $assunto = $this->assuntoService->getassunto((int)$codAu);

        if (empty($assunto)) {
            return redirect()->route('assunto.index')->withErrors(['error' => "Assunto não encontrado"]);
        }

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
        $result = $this->assuntoService->update((int)$assunto, $dados['descricao']);
        return $this->lidaRedirect($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $assunto)
    {
        $result = $this->assuntoService->delete((int)$assunto);
        return $this->lidaRedirect($result);
    }

    private function lidaRedirect(ServiceControllerDto $result)
    {
        if ($result->status) {
            return redirect()->route('assunto.index')->with('success', $result->mensagem);
        }

        return redirect()->back()->withErrors(['error' => $result->mensagem]);
    }
}
