<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
use App\User;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginview()
    {
        return view('auth/login');
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    /**
     * Return a callback method from google api.
     *
     * @return callback URL from google
     */
    public function callback()
    {   
        // $host = request()->getHttpHost();
        // if ($host == "resourcingtest.nimapinfotech.com") {
        //     $user_array = array("sagar@nimapinfotech.com", "priyank@nimapinfotech.com", "kunaljagtap@nimapinfotech.com", "brijesh@nimapinfotech.com", "sonali@nimapinfotech.com");
        // }elseif ($host == "resourcing.nimapinfotech.com") {
        //     $user_array = array("sagar@nimapinfotech.com", "priyank@nimapinfotech.com", "brijesh@nimapinfotech.com");
        // }elseif ($host == "localhost") {
        //     $user_array = array("sagar@nimapinfotech.com", "priyank@nimapinfotech.com", "brijesh@nimapinfotech.com", "kunaljagtap@nimapinfotech.com","omprakash@nimapinfotech.com","sonatan@nimapinfotech.com");
        // }

        //Get user data from database for validation - Start
        $user_array = array();
        $tempData = User::all();
        foreach($tempData as $value){
            $user_array[] = $value->email;
        }
        //Get user data from database for validation - End

        // dd($user_array);

            //dd($googleUser);
        try{
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email',$googleUser->email)->first();
         
            if (in_array($googleUser->email, $user_array)) {

                if($existUser) {
                    Auth::loginUsingId($existUser->id);
                    //Set email address in session
                    \Session::put('user_login',$googleUser->email);
                    \Session::put('user_login_id',$existUser->id);

                    return redirect()->to('/');
                }
                else {
                    $user = new User;
                    $user->name = $googleUser->name;
                    $user->email = $googleUser->email;
                    // $user->google_id = $googleUser->id;
                    $user->password = md5(rand(1,10000));
                    $user->save();
                    Auth::loginUsingId($user->id);

                    //Set email address in session
                    \Session::put('user_login',$googleUser->email);
                    \Session::put('user_login_id',$user->id);

                    return redirect()->to('/');
                }
            }else{
                return redirect()->to('/login-error')->with('error','You have not access to this site');
            }
        } catch (Exception $e) {
            return redirect('login')->with('error','Please try again');
        }
    }

    public function logout()
    {
      Auth::logout();

      return redirect()->to('login')->with('Success','You have Successfully Logout');
    }

    public function loginerror()
    {
      return view('auth/error');
    }
}
