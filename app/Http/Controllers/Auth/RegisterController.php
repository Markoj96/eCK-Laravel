<?php
/*
    Marko Jovanovic 0635/2015
*/
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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

     /*
        Marko Jovanovic 0635/2015

        Radjena je samo mala izmena metode koja proverava ispravnost unetih podataka
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'ime' => 'required|string|max:32',
            'prezime' => 'required|string|max:32',
            'pol' => 'required|string',
            'datum' => 'required|date',
            'prebivaliste' => 'required|string|max:64',
            'zanimanje' => 'required|string|max:64',
            'pravaPristupa' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

     /*
        Marko Jovanovic 0635/2015

        Radjena je samo mala izmena metode koja kreira novog korisnika
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'ime' => $data['ime'],
            'prezime' => $data['prezime'],
            'pol' => $data['pol'],
            'datumRodjenja' => $data['datum'],
            'prebivaliste' => $data['prebivaliste'],
            'pravaPristupa' => $data['pravaPristupa'],
            'zanimanje' => $data['zanimanje'],
            'datumPristupa' => date("Y-m-d"),
        ]);
    }
}
