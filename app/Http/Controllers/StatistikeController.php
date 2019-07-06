<?php

namespace App\Http\Controllers;

use App\User;
use App\Aktivnost;
use App\Seminar;
use Illuminate\Http\Request;

class StatistikeController extends Controller
{
    public function index()
    {
        $ukupnoVolontera = User::all()->count();

        $muskihVolontera = User::where('Pol', '=', 'M')->count();

        $zenskihVolontera = User::where('Pol', '=', 'Z')->count();

        $ukupnoAktivnosti = Aktivnost::all()->count();

        $trenutnoOtvorenih = Aktivnost::whereDate('datumDo', '2100-01-01')->count();

        $brojSeminara = Seminar::all()->count();

        $brojUcesnika = Seminar::all()->sum('brojUcesnika');
        $prosecanBroj = $brojUcesnika/$brojSeminara;

        return view('statistike/index')->with(["ukupnoVolontera" => $ukupnoVolontera, "muskihVolontera" => $muskihVolontera, "zenskihVolontera" => $zenskihVolontera, "ukupnoAktivnosti" => $ukupnoAktivnosti, "trenutnoOtvorenih" => $trenutnoOtvorenih, "brojSeminara" => $brojSeminara, "prosecanBroj" => $prosecanBroj]);
    }
}
