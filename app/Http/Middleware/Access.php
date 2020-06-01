<?php

namespace App\Http\Middleware;

use Closure;

class Access
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        switch ($role)
        {
            case 'admin':
                if(!$request->user()->is_admin)
                {
                    if($request->ajax())
                        return response()->json('Вы не являетесь администратором!', 403);
                        abort(404);
                }
                break;
            default:
                return response()->json('Вы не являетесь администратором!', 403);
                break;
        }
        return $next($request);
    }
}
