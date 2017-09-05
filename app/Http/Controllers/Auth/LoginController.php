<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {   
        if ($provider == 'twitter') {
            $userSocial = Socialite::driver($provider)->user();
        } else {
            $userSocial = Socialite::driver($provider)->stateless()->user();  
        }

        $findUser = User::where('email', $userSocial->email)->first();

        if ($findUser) {
            Auth::login($findUser);
            return redirect($this->redirectTo);
        } else {
            $user = new User;
            $user->role_id = 1;
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt(123456);
            $user->provider = $provider;
            $user->provider_id = $userSocial->id;
            $user->image = $userSocial->getAvatar();
            $user->save();

            Auth::login($user);
            return redirect($this->redirectTo);
        }

        
    }
}
