<?php

namespace App\Http\Controllers;
use App\Services\TwitchAPI;
use App\Services\TwitchProvider;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public $provider;
    public function __construct()
    {
        $this->provider=new TwitchProvider([
            'clientId'                => 'nbjcw8wo7so2vfqwgq7mbntkezafs8',     // The client ID assigned when you created your application
            'clientSecret'            => '018w89o74vt2rtzyo42hvj0lqslbts', // The client secret assigned when you created your application
            'redirectUri'             => 'https://mystreamlab.herokuapp.com',  // Your redirect URL you specified when you created your application
            'scopes'                  => ['user:read:email']  // The scopes you would like to request
        ]);
    }

    public function index(Request $request)
    {

        $input=$request->all();
        if (!isset($input['code'])) {

            // Fetch the authorization URL from the provider, and store state in session
            $authorizationUrl = $this->provider->getAuthorizationUrl();
            $_SESSION['oauth2state'] = $this->provider->getState();

            // Display link to start auth flow
//            echo "<html><a href=\"$authorizationUrl\">Click here to link your Twitch Account</a><html>";
//            exit;
            return view('welcome2', compact('authorizationUrl'));
        } elseif (empty($input['state']) || (isset($_SESSION['oauth2state']) && $input['state'] !== $_SESSION['oauth2state']))
        {
            if (isset($_SESSION['oauth2state'])) {
                unset($_SESSION['oauth2state']);
            }
            return 'invalid';
        }
        else {
            try {

                // Get an access token using authorization code grant.
                $accessToken = $this->provider->getAccessToken('authorization_code', [
                    'code' => $_GET['code']
                ]);

                // Using the access token, get user profile
                $resourceOwner = $this->provider->getResourceOwner($accessToken);
                $user = $resourceOwner->toArray();
                $user = $user['data'][0];
                $token= $accessToken->getToken();
                $refresh = $accessToken->getRefreshToken();
                Session::put($user);
                Session::put('token',$accessToken->getToken());
                Session::put('refresh', $accessToken->getRefreshToken());


                return redirect('/home');

//        echo $user['data'][0]['login'];

                // You can now create authenticated API requests through the provider.
//                $request = $this->provider->getAuthenticatedRequest(
                //    'GET',
                //    'https://api.twitch.tv/kraken/user',
                //    $accessToken
                //);

            } catch (Exception $e) {
                exit('Caught exception: '.$e->getMessage());
            }
        }


    }

    public function store(Request $request)
    {
        $input = $request->all();
        if(Subscription::where(['user_id' => $input['requester'], 'sub_id' => $input['streamer']])->count() ==0
            && Subscription::where('sub_id', $input['streamer'])->count() == 0)
        {
            $api = new TwitchAPI();
            $api->allEvent($input['streamer']);

            $subscription= new Subscription();
            $subscription->user_id = $input['requester'];
            $subscription->sub_id = $input['streamer'];
            $subscription->sub_name = $input['streamer-login'];
            $subscription->save();
        }
        elseif (Subscription::where(['user_id' => $input['requester'], 'sub_id' => $input['streamer']])->count() ==0)
        {
            $subscription= new Subscription();
            $subscription->user_id = $input['requester'];
            $subscription->sub_id = $input['streamer'];
            $subscription->sub_name = $input['streamer-login'];
            $subscription->save();
        }
        return redirect()->route('home');


    }
}
