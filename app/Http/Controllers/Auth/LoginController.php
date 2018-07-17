<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
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
     * Redirect the user to the Facebook OAuth.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Redirect users after being authenticated
     *
     * @return \Illuminate\Http\Response
     */
    public function facebookCallback()
    {
        try{
            $user= Socialite::driver('facebook')->user();
        }
        catch(Exception $e){
            return redirect('/');
        }

        //dd(user);

        $authUser = $this->findOrCreateUser($user);

        $avatar = $user->avatar;

        Auth::login($authUser, true);

        return redirect()->route('show.contact')->withAv($avatar);
    }

     public function findOrCreateUser($facebookUser){

        //Check if email exists in database
        $authUser = User::where('email', $facebookUser->email)->first();

        if($authUser){
            return $authUser;
        }

        return User::create([
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
            'avatar' => $facebookUser->avatar,
            'password' => bcrypt(1234567)
        ]);
    }

    // Redirect the user to the Google OAuth.

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //Redirect users after being authenticated
     public function googleCallback(){
        try{
            $user= Socialite::driver('google')->stateless()->user();
        }
        catch(Exception $e){
            return redirect('/');
        }

        // dd($user);

        $authUser = $this->createUser($user);

        Auth::login($authUser, true);

        return redirect()->route('show.contact');
    }

     public function createUser($googleUser){

        //Check if email exists in database
        $authUser = User::where('email', $googleUser->email)->first();

        //dd($authUser)
        
        if($authUser){
            return $authUser;
        }

        return User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'avatar' => $googleUser->avatar,
            'password' => bcrypt(1234567)
        ]);
    }
}
