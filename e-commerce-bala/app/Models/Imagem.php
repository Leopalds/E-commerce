<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    use HasFactory;

    protected $table = 'imagens';

    protected $fillable = [
        'nome',
        'tamanho',
        'extensao'
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'imagem_produto');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_imagem');
    }
}
