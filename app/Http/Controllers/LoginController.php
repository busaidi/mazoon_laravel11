<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LoginController extends Controller
{

    //this method will show login page for Customer
    public function index()
    {
        // Store the intended URL before redirecting to the login page
        // I add this to save intended URL >> Hamed
        if (!session()->has('url.intended')) {
            session()->put('url.intended', url()->previous());
        }
        return view('login');
    }

    //this method will auth user
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Retrieve and forget the intended URL after successful authentication
                $intendedUrl = session()->pull('url.intended', route('home'));
                return redirect()->to($intendedUrl);
            } else {
                return redirect()->route('account.login')->with('error', 'Either email or password is incorrect.');
            }
        } else {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }



    //This method will show register page
    public function register()
    {
        return view('register');
    }

    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        if($validator->passes()){
            $user = new User();
            $user-> name      =$request->name;
            $user-> email     =$request->email;
            $user-> password  = Hash::make($request->password);
            $user-> role       = 'customer';
            $user-> save();


            return redirect()->route('account.login')->with('success', 'You have successfully registered. ');

        } else {
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }

    }

    public function logout()
    {
        /* Auth::logout();
         return redirect()->route('home');*/
        // Store the current URL
        $previousUrl = url()->previous();

        Auth::logout();

        // Redirect the user to the previous URL
        return Redirect::to($previousUrl);

    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if a user exists and log them in
            $user = User::updateOrCreate([
                'email' => $googleUser->email,
            ], [
                'google_id' => $googleUser->id,
                'name' => $googleUser->name,
                'password' => Hash::make(Str::random(24)), // You can also leave password empty or handle it differently depending on your authentication setup
            ]);

            Auth::login($user, true);

            // Redirect user to their intended location
            $intendedUrl = session()->pull('url.intended', route('home'));
            return redirect()->to($intendedUrl);
        } catch (\Exception $e) {
            // In case of error
            return redirect()->route('account.login')->with('error', 'Failed to login with Google: ' . $e->getMessage());
        }
    }

    public function redirectToGoogle()
    {

        $locale = LaravelLocalization::getCurrentLocale();
        $language = $this->mapLocaleToGoogleLanguage($locale);

        /*return Socialite::driver('google')->redirect();*/
        return Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email'])
            ->with([
                'prompt' => 'select_account consent',
                'hl' => $language
            ])
            ->redirect();
    }

    protected function mapLocaleToGoogleLanguage($locale)
    {
        // Map your application locales to Google's language codes
        $languageMap = [
            'en' => 'en',  // English
            'ar' => 'ar',  // Arabic
            // Add other mappings as needed
        ];

        return $languageMap[$locale] ?? 'en';  // Default to English if not mapped
    }


}
