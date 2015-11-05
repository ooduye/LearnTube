<?php

namespace LearnTube\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Socialite;
use Cloudder;
use LearnTube\User;
use Illuminate\Http\Request;
use LearnTube\Http\Requests;
use LearnTube\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|max:20',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password'))
        ]);

        Auth::login($user, true);

        return redirect()->route('index');
    }

    public function edit()
    {
        return view('auth.edit');
    }

    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        if ( isset( $request['avatar_url'] ) ){
            Cloudder::upload($request['avatar_url']);
            $user->avatar_url = Cloudder::getResult()['url'];
        }
        $user->fullname = $request['fullname'];
        $user->username = $request['username'];
        $user->email = $request['email'];


        $user->save();

        return redirect()->route('videos.index');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $authStatus = Auth::attempt($request->only(['email', 'password']), $request->has('remember'));
        if (!$authStatus) {
            return redirect()->back()->with('warning', 'Invalid Email or Password');
        }

        return redirect()->route('index');
    }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @param $provider
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from a provider.
     *
     * @param $provider
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::to("login/$provider");
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);

        return redirect()->route('index');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $userDetails
     * @param $provider
     * @return User
     */
    private function findOrCreateUser($userDetails, $provider)
    {
        $provider_id = $provider . '_id';

        if ($authUser = User::where($provider_id, $userDetails->id)->first()) {
            return $authUser;
        }

        if ($provider === "twitter") {
            return User::create([
                'fullname' => $userDetails->name,
                'username' => $userDetails->nickname,
                'email' => $userDetails->nickname,
                'twitter_id' => $userDetails->id,
                'avatar_url' => $userDetails->avatar
            ]);
        }

        return User::create([
            'fullname'   => $userDetails->name,
            'username'   => $userDetails->nickname,
            'email'      => $userDetails->email,
            $provider_id => $userDetails->id,
            'avatar_url' => $userDetails->avatar
        ]);
    }

    public function logOut()
    {
        Auth::logout();

        return redirect()->route('index');
    }
}
