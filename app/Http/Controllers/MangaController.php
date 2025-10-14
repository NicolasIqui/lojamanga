<?php

namespace App\Http\Controllers;
use App\Models\MangaModel;
use App\Models\CategoriaModel;
use Illuminate\Support\Facades\DB;
use App\Models\CategoriaMangaModel;

use Illuminate\Http\Request;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        /**

    public function index()
    {
    //    echo "acessando o metodo index" ;
            $mangas=MangaModel::all();
            foreach($mangas as $m){
                echo $m->id .' ' ;
                echo $m->nomeManga .' ' ;
                echo $m->autorManga  .' ';
                echo $m->caminhoImagemManga .'<br/> ';
            }
    }
    */

    
    public function exibirManga() {
               // $mangas = MangaModel::take(4)->get(); // ou ->limit(4)->get()

        $mangas = MangaModel::all(); // ou outra consulta
        return view('nivelUsuario.manga', compact('mangas'));
    }
     public function exibirMangaw() {
        // Pega apenas 2 mangas
        $mangas = MangaModel::take(2)->get(); 
        return view('nivelUsuario.manga', compact('mangas'));
    }




    
public function exibirFormularioManga()
{
    $categorias = CategoriaModel::all(); // pega todas as categorias da tabela tbcategoria
    return view('nivelAdmin.formManga', compact('categorias'));
}

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagemPath = null;
    
        // Verificar se o arquivo foi enviado e se é válido
        if ($request->hasFile('caminhoImagemManga') && $request->file('caminhoImagemManga')->isValid()) {
            // Obter o nome original do arquivo
            $nomeArquivo = $request->file('caminhoImagemManga')->getClientOriginalName();
    
            // Definir o caminho onde o arquivo será salvo
            $caminhoDestino = public_path('imginsert'); // Garantir que o caminho esteja correto
    
            // Armazenar o arquivo na pasta 'imginsert'
            $request->file('caminhoImagemManga')->move($caminhoDestino, $nomeArquivo);
    
            // Atribuir o nome do arquivo para o banco
            $imagemPath = $nomeArquivo;
        }
    
        // Criar e salvar o manga no banco
        $manga = new MangaModel();
        $manga->nomeManga = $request->input('nomeManga');
        $manga->caminhoImagemManga = $imagemPath;  // Apenas o nome do arquivo será salvo no banco
        $manga->sinopseManga = $request->input('sinopseManga');
        $manga->autorManga = $request->input('autorManga');
        $manga->valorManga = $request->input('valorManga');
        $manga->dataDeLancamentoManga = $request->input('dataPublicacao');
        $manga->save();
    
    $categoriaId = $request->input('categoriaManga');

    $manga->categorias()->attach($categoriaId);

    return redirect('/mangas')->with('success', 'Mangá inserido com sucesso!');
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
