<?php
namespace App\Http\Middleware;

use Closure;

class CheckResetPassword
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->force_password_reset) {
            return redirect('/auth/force-password-reset');
        }

        return $next($request);
    }
}
