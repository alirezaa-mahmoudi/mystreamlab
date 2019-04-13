<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TwitchHandlerController extends Controller
{
    public function index(Request $request, $id)
{

    $input=$request->all();
    if(isset($input['hub_challenge'])) {
        Log::info('hub_challenge', $input);
        return $input['hub_challenge'];
    }
    else
    {
        return 1;
    }

}

    Public function store(Request $request, $id)
    {
        $event = new Event();
        $event->owner=$id;
        $event->event_des=json_encode( $request->all());
        $event->save();
        return 1;

    }
}
