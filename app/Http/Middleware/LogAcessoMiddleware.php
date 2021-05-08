<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->server->get('REMOTE_ADDR'); // Pega o IP do Cliente

        $rota = $request->getRequestUri(); // Pega o IP do Cliente

        LogAcesso::create(['log' => "O IP $ip requisitou a rota $rota"]);

        return $next($request);
    }
}
