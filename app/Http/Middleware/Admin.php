<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }
        
        // Перенаправляем обычного пользователя на страницу туров
        return redirect()->route('tours.index')->with('error', 'Доступ запрещён. Только для администратора.');
    }
}