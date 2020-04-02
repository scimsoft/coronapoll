<?php
// app/Http/Middleware/RequestLogger.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class RequestLogger
{
    public function handle( $request, Closure $next )
    {
        Log::debug( 'LOGGING REQUEST PATH', [ $request->path() ] );
        Log::debug( 'LOGGING REQUEST ROUTE NAME',[  $request->route() ] );
        $response = $next( $request );

        //Log::debug( 'LOGGING RESPONSE', [ $response ] );

        return $response;
    }
}