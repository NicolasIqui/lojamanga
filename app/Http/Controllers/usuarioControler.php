<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class usuarioControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
public function downloadPdf()
    {

        $usuarios = User::all();

        $dados = compact('usuarios');
        
        $pdf = PDF::loadView('nivelAdmin.pdf', $dados);
        
        return $pdf->download('documento.pdf'); // Faz o download do PDF
        
        // return $pdf->stream('documento.pdf'); // Exibe o PDF no navegador
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function perfil()
{
    $user = Auth::user(); // Pega usuário logado
    return view('nivelUsuario.perfil', compact('user'));
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
            $usuario=new User();
            $usuario->name=$request->input('username');
            $usuario->email=$request->input('email');
            $usuario->password = Hash::make($request->input('password')); 
            $usuario->imagem="";
            $usuario->nivelAcesso=1;
            $usuario->save();
        return redirect('/login')->with('success', 'Categoria inserido com sucesso!');


    //  
    }
public function fazerLogin(Request $request)
{
    if (!Auth::attempt($request->only(['email', 'password']))) {
        return redirect('/login')->with('error', 'Credenciais inválidas');
    }
    $user = Auth::user();  
    if ($user->nivelAcesso == 0) {
        return redirect('/');
    }

    return redirect('/');
}
        public function fazerLogOut(Request $request){
        Auth::logout();
        return redirect('/login');  
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
            public function contarUsuarios()
        {
            $total = User::count();
            return $total;
        }

public function dashboard()
{
    $usuariosPorMes = DB::table('users')
        ->select(DB::raw('MONTH(created_at) as mes'), DB::raw('COUNT(*) as total'))
        ->groupBy('mes')
        ->get()
        ->map(function ($item) {
            $meses = [
                1=>'Janeiro',2=>'Fevereiro',3=>'Março',4=>'Abril',5=>'Maio',6=>'Junho',
                7=>'Julho',8=>'Agosto',9=>'Setembro',10=>'Outubro',11=>'Novembro',12=>'Dezembro'
            ];
            return (object)[
                'mes_nome' => $meses[$item->mes],
                'total' => $item->total
            ];
        });

    $totalMangas = \App\Models\MangaModel::count();
    $totalQuadrinhos = \App\Models\QuadrinhoModel::count();

    return view('nivelAdmin.dashboard', compact('usuariosPorMes', 'totalMangas', 'totalQuadrinhos'));
}



            /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(Request $request)
{
    /** @var \App\Models\User $usuario */

    $usuario = Auth::user(); // garante que seja um User
    $usuario->name = $request->input('name');
    $usuario->email = $request->input('email');

    if ($request->filled('password')) {
        $usuario->password = Hash::make($request->input('password'));
    }

    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
        $nomeArquivo = $request->file('imagem')->getClientOriginalName();
        $caminhoDestino = public_path('imgUsuarios');
        $request->file('imagem')->move($caminhoDestino, $nomeArquivo);
        $usuario->imagem = $nomeArquivo;
    }

    $usuario->save(); // agora não deve mais dar erro

    return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
}



 public function download()
    {               
        $sql = 'select * from users';

        $queryJson = DB::select($sql);

        // Nome do arquivo CSV
        $filename = 'usuarios.csv';

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
        $col2 = "name";
        $col3 = "email";
        fwrite($file, "$col1;$col2;$col3;");

        foreach ($queryJson as $d) {
            $data1 = $d->id;
            $data2 = mb_convert_encoding($d->name, "ISO-8859-1", "UTF-8");
            $data3 = $d->email;
            fwrite($file, "\n$data1;$data2;$data3;");
        }    
            fclose($file);
        };
               return Response::stream($callback, 200, $headers);
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
