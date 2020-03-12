<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

use Closure;

class checkTubesStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */    
    private $storeTubesStatus = null;

    public function handle($request, Closure $next)
    {

        if (!Cache::has('cachedTubesStatus')) {

            $this->getTubesStatus();

            Cache::add('cachedTubesStatus', $this->storeTubesStatus, Carbon::now()->addMinutes(5));
            Cache::add('lastUpdateDate', Carbon::now(), Carbon::now()->addMinutes(5));

        }



        return $next($request);
    }

    private function getTubesStatus() {

        $client = new \GuzzleHttp\Client();

        $request = new \GuzzleHttp\Psr7\Request('GET', env('TUBE_API_URL') . '&app_key=' . env('TUBE_API_KEY') . '&app_id=' . env('TUBE_API_ID'));
        $promise = $client->sendAsync($request)->then(function ($response){
            $this->storeTubesStatus = json_decode($response->getBody()->getContents());
        });

        $promise->wait();

    }
}
