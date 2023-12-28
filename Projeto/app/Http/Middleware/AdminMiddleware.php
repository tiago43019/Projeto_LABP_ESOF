<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado e é um administrador
        if (auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request);
        }

        // Redireciona para a página de login se não for um administrador
        abort(403, 'Não tem permissões para aceder a esta página');
    }
}
