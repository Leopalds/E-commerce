<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'produto_categoria');
    }

    public function imagens()
    {
        return $this->hasMany(Imagem::class);
    }

    public function unicaImagem()
    {
        return $this->imagens()->limit(1);
    }
}
