<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Mail;
use App\Mail\EmailConfirmation;
use Socialite;
use App\SocialProvider;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'password' => 'required|min:6|confirmed',
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

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        Mail::to($user->email)->send(new EmailConfirmation($user));

        return redirect('login')->with('status', 'Silahkan konfirmasi alamat email.');
    }

    public function confirmEmail($token)
    {
        User::whereToken($token)->firstOrFail()->hasVerified();

        return redirect('login')->with('status', 'Akun sudah dikonfirmasi. Silahkan login.');
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
           $socialUser = Socialite::with($provider)->user();
       } catch (Exception $e) {
           return redirect('/');
       }

       $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();
       if (!$socialProvider) {
           $user = User::firstOrCreate(
             ['email' => $socialUser->getEmail()],
             ['name' => $socialUser->getName()]
           );

           $user->socialProviders()->create(
             ['provider_id' => $socialUser->getId(), 'provider' => $provider]
           );

       } else {
           $user = $socialProvider->user;
       }

       auth()->login($user);

       $user->verified = 1;
       $user->save();

       if ($user->admin == 1) {
         return redirect('/admin/dashboard');
       }
       elseif ($user->vendor == 1) {
         return redirect('/vendor/dashboard');
       }
       else {
         return redirect('/');
       }
     }
}
