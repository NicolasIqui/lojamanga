<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;
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
