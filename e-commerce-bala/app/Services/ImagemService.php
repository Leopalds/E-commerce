<?php 

namespace App\Services;

use App\Models\Imagem;

class ImagemService
{
    public function salvar($imagens, $entidade)
    {
        if (count($imagens) > 3 || count($entidade->imagens) >= 3) {
            return [
                'success' => false,
                'erro' => 'Um produto pode ter no máximo 3 imagens!'
            ];
        }
        
        foreach($imagens as $imagem) {
            $nome = $imagem->getClientOriginalName();
            
            if (Imagem::where('nome', $nome)->exists()) {
                $dbImagem = Imagem::where('nome', $nome)->first();
                $entidade->imagens()->attach($dbImagem->id);
                break;
            }

            $extensao = $imagem->extension();
            $tamanho = $imagem->getSize();

            $entidade->imagens()->create([
                'nome' => $nome,
                'tamanho' => $tamanho,
                'extensao' => $extensao,
            ]);
            $imagem->storeAs('img/produto', $nome, 'public');
        }

        return [
            'success' => true
        ];
    }
}