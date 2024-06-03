<?php

// app/Http/Middleware/ApiResponseMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;

class ApiResponseMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof JsonResponse) {
            $data = $response->getData(true);
            $response->setData([
                'status' => $response->status(),
                'data' => $data,
            ]);
        }

        return $response;
    }
}
