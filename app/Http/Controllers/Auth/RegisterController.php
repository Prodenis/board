<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;


    protected $redirectTo = '/cabinet';


    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            //'verify_token' => Str::random(),
            //'status' => User::STATUS_WAIT,
        ]);

        //Mail::to($user->email)->send(new VerifyMail($user));

        return $user;
    }


    /*protected function registered(Request $request, $user)
    {
        $this->guard()->logout();

        return redirect()->route('login')
            ->with('success', 'Check your email and click on the link to verify');
    }*/


    /*public function form()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confired'
            ]);

            if (!true) {
                return redirect()->route('form')->exceptInput();
            }

            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password'])
            ]);

            Auth::login($user);

            return redirect()->route('cabinet');

    }*/




}
