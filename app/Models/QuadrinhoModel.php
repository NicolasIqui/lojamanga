<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaModel;

class QuadrinhoModel extends Model
{
    use HasFactory;

    protected $table = "tbquadrinho";

    protected $fillable = [
        'id',
        'nomeQuadrinho',
        'caminhoImagemQuadrinho',
        'sinopseQuadrinho',
        'autorQuadrinho',
        'valorQuadrinho',
        'dataDeLancamentoQuadrinho',
        'created_at',
        'updated_at'
    ];

    public function categorias()
    {
        return $this->belongsToMany(
            CategoriaModel::class,
            'tbcategoriaquadrinho',
            'idquadrinho',
            'idcategoria'
        );
    }
}
