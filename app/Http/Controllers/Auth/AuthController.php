<?php

namespace Krenova\Http\Controllers\Auth;

use Socialite;
use Krenova\User;
use Validator;
use Krenova\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function login()
    {
        if(session('user'))
            return redirect('submission');

        return view('login');
    }

    public function logout(Request $request)
    {
        session(['user' => null]);

        if( $next = $request->input('next') )
            return redirect($next);

        return redirect('auth/login');
    }

    public function socialLogin($provider = 'facebook')
    {
        return Socialite::driver($provider)->redirect();
    }

    public function facebookCallback(Request $request)
    {
        if($request->input('error'))
            die('Access denied.');

        $fbData = Socialite::driver('facebook')->user();

        $user   = User::firstOrCreate([
            'fb_id'         => $fbData->id,
            'fb_nickname'   => $fbData->nickname,
            'email'         => $fbData->email,
            'name'          => $fbData->name,
            'avatar'        => $fbData->avatar_original,
        ]);
        $user->save();

        session(['user' => $user]);

        return redirect('submission/create');
    }


    public function twitterCallback(Request $request)
    {
        if($request->input('denied'))
            die('Access denied.');

        $twData = Socialite::driver('twitter')->user();
        $user   = User::firstOrCreate([
            'tw_id'         => $twData->id,
            'tw_nickname'   => $twData->nickname,
            'email'         => $twData->email,
            'name'          => $twData->name,
            'avatar'        => $twData->avatar_original,
        ]);
        $user->save();

        session(['user' => $user]);
        return redirect('submission/create');
    }

    public function githubCallback(Request $request)
    {
        $githubData = Socialite::driver('github')->user();
        $user   = User::firstOrCreate([
            'github_id'         => $githubData->id,
            'github_nickname'   => $githubData->nickname,
            'email'             => $githubData->email,
            'name'              => $githubData->name,
            'avatar'            => $githubData->avatar,
        ]);
        $user->save();

        session(['user' => $user]);
        return redirect('submission/create');
    }
}
