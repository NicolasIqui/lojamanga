<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
    use HasFactory;
    protected $table='tbcategoria';
    public $fillable=['id','nomeCategoria','created_at','updated_at'];
    
  //      public $timestamps = false;
  }
