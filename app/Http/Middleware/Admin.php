<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()?->isAdmin()) {
            if ($request->wantsJson()) {        // Accept: application/json
                return response()->json([
                    'status'  => 403,
                    'message' => 'Forbidden. You don`t have admin permissions.',
                ]);
            }

            return redirect()->to(route('drinks.index'));
        }

        return $next($request);
    }
}
