<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("Create View vw_AutorPorAssuntoQtdLivro as select a.nome as nome, ass.descricao as descricao, l.codl, count(l.codl) as quantidade_livros from autor a
        inner join livro_autor lau on a.codAu = lau.autor_codAu
        inner join livro l on lau.livro_codl = l.codl
        inner join livro_assunto las on l.codl = las.livro_codl
        inner join assunto ass on las.assunto_codAs = ass.codAs
        group by a.nome, ass.descricao, l.codl
        order by a.nome, ass.descricao");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW vw_AutorPorAssuntoQtdLivro");
    }
};
