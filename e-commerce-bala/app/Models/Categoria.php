<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nome'
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produto_categoria');
    }
}
