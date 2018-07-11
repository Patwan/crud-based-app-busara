<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

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
    protected $redirectTo = 'user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //constructor function and the code inside means that everybody in this page is a guest except logout.
    public function __construct()
    {
        //Except logout means every single function in the controller will pass through the middleware except the logout action.
        //- The guest middleware simply means that every action in this controller needs you to be a guest in order to access it except logout action/function
        //- If you wanted your application or some pages in your website to be used by logged in users you would use auth middleware. Auth means authenticated
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        // $user->token;
        
        //Redirect to apge after Google login
        // return redirect()->route('show.contact');
    }
}
