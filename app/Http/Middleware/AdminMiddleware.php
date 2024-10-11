<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // تحقق إذا كان المستخدم هو admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request); // تابع المعالجة
        }

        // إعادة توجيه المستخدم في حال لم يكن admin
        return redirect('home')->with('error', 'You do not have admin access');
    }
}
