<div class="row g-3 align-items-center mb-2">
    <div class="col-1">
        <label class="col-form-label" for="titulo">Titulo:</label>
    </div>
    <div class="col-11">
       <input class="form-control" type="text" name="titulo" id="titulo" value="{{ $livro->titulo }}">
    </div>
</div>

<div class="row g-3 align-items-center mb-2">
    <div class="col-1">
        <label class="col-form-label" for="editora">Editora:</label>
    </div>
    <div class="col-11">
       <input class="form-control" type="text" name="editora" id="editora" value="{{ $livro->editora }}">
    </div>
</div>

<div class="row g-3 align-items-center mb-2">
    <div class="col-1">
        <label class="col-form-label" for="edicao">Edição:</label>
    </div>
    <div class="col-11">
       <input class="form-control" type="number" name="edicao" id="edicao" value="{{ $livro->edicao }}">
    </div>
</div>

<div class="row g-3 align-items-center mb-2">
    <div class="col-1">
        <label class="col-form-label" for="editora">Ano de Publicação:</label>
    </div>
    <div class="col-11">
       <input class="form-control" type="text" name="anoPub" id="anoPub" value="{{ $livro->anoPublicacao }}">
    </div>
</div>
