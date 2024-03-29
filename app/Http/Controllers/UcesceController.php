<?php
/*
Srdjan Skorkovic 0329/15
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Ucesce;
use App\User;

/*
Srdjan Skorkovic 0329/15

Klasa ucesce sluzi da predstavlja vezu izmedju aktivnosti i volontera
Kreirane su sve funkcije kompletnog kontrolera od kojih su neke iskoriscene
*/

class UcesceController extends Controller
{
   /* /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /* Srdjan Skorkovic 0329/15 
    
    Kreira se ucesce volontera. Ova funkcionalnost je mogla da se obavi i u store funkciji
    $user predstavlja ulogovanog korisnika, a aktivnost je izabrana u aplikaciji prijavom, pa se sa ta dva
    id-a generise ucesce za volontera
    
    */
    public function create($parametar)
    {

        $user = Auth::user();
        $ucesce = \App\Ucesce::where('idAktivnost', $parametar)->
            where('idVolonter', $user->id)->get();
        if($ucesce->count() == 0){
            $ucesce = new Ucesce;
            $ucesce->idAktivnost = $parametar;
            $ucesce->idVolonter = $user->id;
            $ucesce->status = false;
            $ucesce->save();
            return redirect("prikaziTekuce")->with("success", "Zabelezena prijava");
        }else{
            return redirect("prikaziTekuce")->with("error", "Vec postoji prijava");
        }     
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
