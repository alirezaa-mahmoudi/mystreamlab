<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LiveController extends Controller
{
    public function index()
    {


        $clientId = 'nbjcw8wo7so2vfqwgq7mbntkezafs8';
        $client = new Client();
        $request = $client->request('GET', 'https://api.twitch.tv/kraken/streams/?limit=1' ,[
            'headers' => [
                'Client-ID' => $clientId,
                'Accept' => 'application/json',
                'Authorization' =>  "OAuth " . session('token')
            ],

        ]);

        $data= (json_decode($request->getBody()->getContents()));
        $channel = $data->streams[0]->channel;

        $events = DB::table('events')
            ->join('subscriptions', 'subscriptions.sub_id', '=','events.owner')
            ->select('events.*','subscriptions.user_id','subscriptions.sub_name')
            ->where('subscriptions.user_id', session('id'))
            ->latest()
            ->limit(10)->get();


        return view('livestream', compact('channel','events' ));
    }
}
