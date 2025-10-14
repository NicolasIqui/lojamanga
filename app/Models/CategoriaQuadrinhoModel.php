<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaQuadrinhoModel extends Model
{
    use HasFactory;

    protected $table = 'tbcategoriaquadrinho';

    public $fillable = ['id', 'idcategoria', 'idquadrinho', 'created_at', 'updated_at'];
}
