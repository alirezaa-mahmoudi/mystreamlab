<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/12/2019
 * Time: 12:54 AM
 */

namespace App\Services;


use GuzzleHttp\Client;

class TwitchAPI
{
    protected $client;
    Protected $clientId;
    public function __construct()
    {
        $this->client= new Client();
        $this->clientId='nbjcw8wo7so2vfqwgq7mbntkezafs8';
    }

    public function getFollowers($userId)
    {
        $request = $this->client->request('GET', 'https://api.twitch.tv/helix/users/follows?from_id=' . $userId,[
            'headers' => [
                'Client-ID' => $this->clientId,
                'Accept' => 'application/json',
            ]
        ]);
        return dd(json_decode($request->getBody()->getContents()));


    }
    public function hookNewFollower($userid)
    {
        $request = $this->client->request('POST', 'https://api.twitch.tv/helix/webhooks/hub' ,[
            'headers' => [
                'Client-ID' => $this->clientId,
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'hub.mode' => 'subscribe',
                'hub.topic' => 'https://api.twitch.tv/helix/users/follows?first=1&to_id='. $userid,
                'hub.callback' => 'http://alirezamahmoudi.com/public/api/path/to/callback/handler/' . $userid ,
                'hub.lease_seconds' => '864000'
            ]
            ]);
        return json_decode($request->getBody()->getContents());

    }
    public function hookNewFollow($userid)
    {
        $request = $this->client->request('POST', 'https://api.twitch.tv/helix/webhooks/hub' ,[
            'headers' => [
                'Client-ID' => $this->clientId,
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'hub.mode' => 'subscribe',
                'hub.topic' => 'https://api.twitch.tv/helix/users/follows?first=1&from_id='. $userid,
                'hub.callback' => 'http://alirezamahmoudi.com/public/api/path/to/callback/handler/' . $userid ,
                'hub.lease_seconds' => '864000'
            ]
        ]);
        return json_decode($request->getBody()->getContents());

    }
    public function StreamChange($userid)
    {
        $request = $this->client->request('POST', 'https://api.twitch.tv/helix/webhooks/hub' ,[
            'headers' => [
                'Client-ID' => $this->clientId,
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'hub.mode' => 'subscribe',
                'hub.topic' => 'https://api.twitch.tv/helix/streams?user_id='. $userid,
                'hub.callback' => 'http://alirezamahmoudi.com/public/api/path/to/callback/handler/' . $userid ,
                'hub.lease_seconds' => '864000'
            ]
        ]);
        return json_decode($request->getBody()->getContents());

    }
    public function allEvent($userid)
    {
        $this->hookNewFollow($userid);
        $this->hookNewFollower($userid);
        $this->StreamChange($userid);
    }

    public function unHookNewFollower($userid)
    {
        $request = $this->client->request('POST', 'https://api.twitch.tv/helix/webhooks/hub' ,[
            'headers' => [
                'Client-ID' => $this->clientId,
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'hub.mode' => 'unsubscribe',
                'hub.topic' => 'https://api.twitch.tv/helix/users/follows?first=1&to_id='. $userid,
                'hub.callback' => 'http://alirezamahmoudi.com/public/api/path/to/callback/handler/' . $userid ,
                'hub.lease_seconds' => '864000'
            ]
        ]);
        return json_decode($request->getBody()->getContents());

    }

    public function unHookNewFollow($userid)
    {
        $request = $this->client->request('POST', 'https://api.twitch.tv/helix/webhooks/hub' ,[
            'headers' => [
                'Client-ID' => $this->clientId,
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'hub.mode' => 'unsubscribe',
                'hub.topic' => 'https://api.twitch.tv/helix/users/follows?first=1&from_id='. $userid,
                'hub.callback' => 'http://alirezamahmoudi.com/public/api/path/to/callback/handler/' . $userid ,
                'hub.lease_seconds' => '864000'
            ]
        ]);
        return json_decode($request->getBody()->getContents());

    }
    public function unStreamChange($userid)
    {
        $request = $this->client->request('POST', 'https://api.twitch.tv/helix/webhooks/hub' ,[
            'headers' => [
                'Client-ID' => $this->clientId,
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'hub.mode' => 'unsubscribe',
                'hub.topic' => 'https://api.twitch.tv/helix/streams?user_id='. $userid,
                'hub.callback' => 'http://alirezamahmoudi.com/public/api/path/to/callback/handler/' . $userid ,
                'hub.lease_seconds' => '864000'
            ]
        ]);
        return json_decode($request->getBody()->getContents());

    }
    public function unsubscribe($user_id)
    {
        $this->unHookNewFollow($user_id);
        $this->unHookNewFollower($user_id);
        $this->unStreamChange($user_id);
    }
    public function Authorization()
    {
        try {
            $this->client->request('GET', 'https://api.twitch.tv/kraken/user', [
                'headers' => [
                    'Client-ID' => 'nbjcw8wo7so2vfqwgq7mbntkezafs8',
                    'Authorization' => 'OAuth ' . session('token')
                ]
            ]);
            return 1;
        }catch (\Exception $e)
        {
            return 0;
        }

    }
}
