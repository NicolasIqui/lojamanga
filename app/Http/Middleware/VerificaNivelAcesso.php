<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerificaNivelAcesso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
public function handle($request, Closure $next, $nivel)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login'); // usuário não logado
    }

    if ((int)$user->nivelAcesso !== (int)$nivel) {
        return redirect('/'); // usuário logado mas sem permissão
    }

    return $next($request);
}
}