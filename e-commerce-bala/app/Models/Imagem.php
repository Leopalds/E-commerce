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

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
