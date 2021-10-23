<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'quantidade'
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'produto_categoria');
    }

    public function imagens()
    {
        return $this->belongsToMany(Imagem::class, 'imagem_produto');
    }

    public function unicaImagem()
    {
        $imagem = $this->imagens()->limit(1);
        return $imagem;
    }
}
