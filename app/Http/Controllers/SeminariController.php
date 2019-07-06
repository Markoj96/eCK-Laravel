<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seminar;
use App\VolSeminar;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;

class SeminariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $seminari = Seminar::all();
        return view("seminar.prikaziTekuce")->with("seminari", $seminari);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('seminar.createseminar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tema' => 'required',
            'mesto' => 'required',
            'datumOdrzavanja' => 'required',
            'brojUcesnika' => 'required|integer',
            'opis' => 'nullable'
        ]);
        $seminar = new Seminar;
        $seminar->tema = $request->input('tema');
        $seminar->datumOdrzavanja = $request->input('datumOdrzavanja');
        $seminar->mesto = $request->input('mesto');
        $seminar->brojUcesnika = $request->input('brojUcesnika');
        if($request->input("opis") != null){
            $seminar->opis = $request->input("opis");
        }
        else{
            $seminar->opis = " ";
        }
        $seminar->save();
        return redirect("kreirajSeminar")->with('success', 'Seminar kreiran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seminar = Seminar::find($id);
        return view('seminar.showseminar')->with("seminar", $seminar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createVolSeminar($id)
    {
        $seminar = Seminar::find($id);
        $user = Auth::user();
        $ucescePostoji = VolSeminar::where('idSeminar','=', $seminar->id)->where('idVolonter','=', $user->id)->count();
        if($ucescePostoji == 0){
            $ucesce = new VolSeminar;
            $ucesce->idSeminar = $seminar->id;
            $ucesce->idVolonter = $user->id;
            
            $ucesce->save();
            return redirect("/prikaziTekuceSeminare")->with('success', 'Prisustvo zabelezno');
        }     

        return redirect("/prikaziTekuceSeminare")->with('error', 'Prisustvo je vec zabelezno');
    }

    public function listaSeminara(){
        $seminari = Seminar::all();
        return view("seminar.listaseminara")->with('seminari', $seminari);
    }

    public function listaVolontera($id){
        $ucesca = VolSeminar::where('idSeminar','=',$id)->get();
        $sem = Seminar::find($id);
        $volonteri = [];
        foreach($ucesca as $ucesce){
            $volonteri[] = User::find($ucesce->idVolonter);
        }
        return view("seminar.listavolontera")->with('volonteri', $volonteri)->with('seminar', $sem);
    }
}
