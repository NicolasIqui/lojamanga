<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaMangaModel extends Model
{
    use HasFactory;
    protected $table='tbcategoriamanga';
    public $fillable=['id','idcategoria', ' idmanga   ','created_at','updated_at'];

    
}
