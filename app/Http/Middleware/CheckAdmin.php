<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(session('admin')){
            return $next($request);
        }
        return redirect('login')->with('status', 'Anda harus login terlebih dahulu!');
    }
}
