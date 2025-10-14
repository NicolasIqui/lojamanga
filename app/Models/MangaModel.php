<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaModel;

class MangaModel extends Model
{
        use HasFactory;
        protected $table="tbManga";
  //      public $timestamps = false;

        public $fillable =[
        'id','
        nomeManga',
        'caminhoImagemManga',
        'sinopseManga',
        'autorManga',
        'valorManga',
        'dataDeLancamentoManga',
        'created_at','updated_at'];

        
        public function categorias()
        {
            return $this->belongsToMany(CategoriaModel::class, 'tbcategoriamanga', 'idmanga', 'idcategoria');
        }
}
