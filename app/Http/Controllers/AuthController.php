<?php

namespace LearnTube\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Socialite;
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
        return view('Auth.register');
    }

    public function getLogin()
    {
        return view('Auth.login');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|max:20',
            'password' => 'required|min:6',
        ]);

        User::create([
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password'))
        ]);

        return redirect()->route('index');
    }

    public function updateUser(Request $request)
    {

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
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
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
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($userDetails, $provider)
    {
        if ($provider === "github") {

            if ($authUser = User::where('github_id', $userDetails->id)->first()) {
                return $authUser;

            }

            return User::create([
                'fullname' => $userDetails->name,
                'username' => $userDetails->nickname,
                'email' => $userDetails->email,
                'github_id' => $userDetails->id,
                'avatar_url' => $userDetails->avatar
            ]);
        } elseif ($provider === "facebook") {
            if ($authUser = User::where('facebook_id', $userDetails->id)->first()) {
                return $authUser;
            }

            return User::create([
                'fullname' => $userDetails->name,
                'username' => $userDetails->nickname,
                'email' => $userDetails->email,
                'facebook_id' => $userDetails->id,
                'avatar_url' => $userDetails->avatar
            ]);

        } elseif ($provider === "twitter") {
            if ($authUser = User::where('twitter_id', $userDetails->id)->first()) {
                return $authUser;
            }

            return User::create([
                'fullname' => $userDetails->name,
                'username' => $userDetails->nickname,
                'email' => $userDetails->nickname,
                'twitter_id' => $userDetails->id,
                'avatar_url' => $userDetails->avatar
            ]);
        }
    }

    public function logOut()
    {
        Auth::logout();

        return redirect()->route('index');
    }
}
