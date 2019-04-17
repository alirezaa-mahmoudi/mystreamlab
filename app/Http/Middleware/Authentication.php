<?php

namespace App\Http\Middleware;

use App\Services\TwitchAPI;
use Closure;
use GuzzleHttp\Client;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (session('token'))
        {
            $twitch=new TwitchAPI();
            if($twitch->Authorization() == 1)
            {
                return $next($request);
            }
            else
                {
                return redirect('/');
            }

        }
        else{
            return redirect('/');
        }


        return $next($request);
    }
}
