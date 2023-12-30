<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'codl';

    protected $table = 'livro';

    protected $fillable = [
        'titulo',
        'editora',
        'edicao',
        'anoPublicacao',
    ];


    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'livro_autor', 'livro_codl', 'autor_codAu');
    }

    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'livro_assunto', 'livro_codl', 'assunto_codAs');
    }
}
