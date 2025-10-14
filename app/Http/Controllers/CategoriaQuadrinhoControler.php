<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaQuadrinhoModel;

class CategoriaQuadrinhoController extends Controller
{
    /**
     * Exibir todas as categorias de quadrinhos
     */
    public function exibirCategoriaQuadrinho()
    {
        $categoriasQuadrinho = CategoriaQuadrinhoModel::all();
        return view('nivelUsuario.quadrinho', compact('categoriasQuadrinho'));
    }

    /**
     * Listar todas as categorias
     */
    public function index()
    {
      
    }

    /**
     * Formulário para criar nova categoria
     */
    public function create()
    {
    }

    /**
     * Salvar nova categoria
     */
    public function store(Request $request)
    {
    
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
      
    }
}
