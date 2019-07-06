<?php
/*
Srdjan Skorkovic 0329/15
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /*
        Srdjan Skorkovic 0329/15

        funckija prikazuje pocetnu stranicu - ako korisnik nije ulogovan onda login stranicu, ako jeste onda welcome
    */
    public function index()
    {
        if (Auth::check()) 
        {
            $user = Auth::user();
            return view("welcome")->with("user", $user);
        }
        else
        {
            return view("auth/login");
        }
    }
}
