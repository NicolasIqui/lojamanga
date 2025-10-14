<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use App\Models\QuadrinhoModel;
use Illuminate\Http\Request;

class QuadrinhoController extends Controller
{
    public function exibirQuadrinho() {
        $quadrinhos = QuadrinhoModel::all();
        return view('nivelUsuario.quadrinho', compact('quadrinhos'));
    }
  public function exibirQuadrinhow() {
        // Pega apenas 2 quadrinhos
        $quadrinhos = QuadrinhoModel::take(2)->get(); 
        return view('nivelUsuario.quadrinho', compact('quadrinhos'));
    }


    public function exibirFormularioQuadrinho()
    {
        $categorias = CategoriaModel::all();
        return view('nivelAdmin.formQuadrinho', compact('categorias'));
    }

    public function store(Request $request)
    {
        $imagemPath = null;

        if ($request->hasFile('caminhoImagemQuadrinho') && $request->file('caminhoImagemQuadrinho')->isValid()) {
            $nomeArquivo = $request->file('caminhoImagemQuadrinho')->getClientOriginalName();
            $caminhoDestino = public_path('imginsert');
            $request->file('caminhoImagemQuadrinho')->move($caminhoDestino, $nomeArquivo);
            $imagemPath = $nomeArquivo;
        }

        $quadrinho = QuadrinhoModel::create([
            'nomeQuadrinho' => $request->input('nomeQuadrinho'),
            'caminhoImagemQuadrinho' => $imagemPath,
            'sinopseQuadrinho' => $request->input('sinopseQuadrinho'),
            'autorQuadrinho' => $request->input('autorQuadrinho'),
            'valorQuadrinho' => $request->input('valorQuadrinho'),
            'dataDeLancamentoQuadrinho' => $request->input('dataPublicacao'),
        ]);

        $categoriaId = $request->input('categoriaQuadrinho');
        $quadrinho->categorias()->attach($categoriaId);

        return redirect('/quadrinhos')->with('success', 'Quadrinho inserido com sucesso!');
    }
}
