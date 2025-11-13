<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use App\Models\QuadrinhoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CategoriaMangaModel;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;

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


 public function download()
    {               
        $sql = 'select * from tbquadrinho';

        $queryJson = DB::select($sql);

        // Nome do arquivo CSV
        $filename = 'quadrinho.csv';

        // Cabeçalho do arquivo
        
        $headers = [
            'Content-Type' => 'text/csv;charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];        

        //Cabeçalho        
        
        $file = fopen('php://output', 'w');

        fclose($file);

        // Gera o arquivo CSV
        $callback = function () use ($queryJson) {
            
        $file = fopen('php://output', 'w');

        //Cabeçalho
        $col1 = "id";
        $col2 = "nomeQuadrinho";
        $col3 = "sinopseQuadrinho";
        $col4 = "autorQuadrinho";
        $col5 = "valorQuadrinho";
        $col6 = "dataDeLancamentoQuadrinho";

        fwrite($file, "$col1;$col2;$col3;$col4;$col5;$col6;");

        foreach ($queryJson as $d) {
            $data1 = $d->id;
            $data2 = mb_convert_encoding($d->nomeQuadrinho, "ISO-8859-1", "UTF-8");
            $data3 = $d->sinopseQuadrinho;
            $data4 = $d->autorQuadrinho;
            $data5 = $d->valorQuadrinho;
            $data6 = " " . date('d/m/Y', strtotime($d->dataDeLancamentoQuadrinho));
            fwrite($file, "\n$data1;$data2;$data3;$data4;$data5;$data6;");
        }    
            fclose($file);
        };
               return Response::stream($callback, 200, $headers);
}




    public function downloadPdf()
    {

        $quadrinhos = QuadrinhoModel::all();

        $dados = compact('quadrinhos');
        
        $pdf = PDF::loadView('nivelAdmin.pdfquadrinho', $dados);
        
        return $pdf->download('documentoquadrinho.pdf'); // Faz o download do PDF
        
        // return $pdf->stream('documento.pdf'); // Exibe o PDF no navegador
    }



}
