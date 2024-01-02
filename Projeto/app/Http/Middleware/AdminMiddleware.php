<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    //Verifica se é admin
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request);
        }

        abort(403, 'Não tem permissões para aceder a esta página');
    }
}
