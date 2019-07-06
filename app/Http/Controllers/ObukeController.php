<?php
/*
Srdjan Skorkovic 0329/15
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obuka;
use App\Obucenost;

/*
Srdjan Skorkovic 0329/15

Klasa za belezenje obuka. Obuke se ne vezuju za volontera vec se samo pamte u bazi da su se desile - vezane su
iskljucivo za obucenost
Generisane su sve funkcije kontrolera od kojih su neke iskoriscene a neke mogu biti naknadno iskoriscene
*/

class ObukeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     *vraca pogled koji prikazuje formu za kreiranje  obucenosti
     * @return \Illuminate\Http\Response
     */
    /*
    Srdjan Skorkovic 0329/15

    funkcija vraca pogled za kreiranje obuka
    $obucenosti je lista svih obucenosti u bazi koja se prosledjuje pogledu za kreiranje obuka kako bi se tamo
    izlistala kao select lista
    */
    public function create()
    {
        $obucenosti = Obucenost::pluck('naziv', 'id');
        return view('obuke.create')->with('obucenosti', $obucenosti);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    Srdjan Skorkovic 0329/15

    store funkcija za smestanje obuke u bazu. Funkcija proverava ispravnost prosledjenih parametara (u $request)
    $obuka predstavlja objekat obuke koji u funkciji dobija vrednost svojih atributa i onda se takav smesta u bazu
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'datumOdrzavanja' => 'required',
            'mesto' => 'required',
            'brojUcesnika' => 'required|integer'
        ]);
        if($request->input('obucenost') == null){
            return redirect("kreirajObuku")->with('error', 'Ne postoji obucenost!');
        }
        $obuka = new Obuka;
        $obuka->idObucenost = $request->input('obucenost');
        $obuka->datumOdrzavanja = $request->input('datumOdrzavanja');
        $obuka->mesto = $request->input('mesto');
        $obuka->brojUcesnika = $request->input('brojUcesnika');
        if($request->input('opis') != null){
            $obuka->opis = $request->input('opis');
        }else{
            $obuka->opis = " ";
        }
        
        $obuka->save();
        return redirect("kreirajObuku")->with('success', 'Obuka kreirana');
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
