<?php

/*
    Marko Jovanovic 0635/2015
    Veljko Djordjevic 0431/2015
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aktivnost;
use App\Ucesce;

/*
    Marko Jovanovic 0635/2015
    Veljko Djordjevic 0431/2015

    Klasa koja obuhvata sav rad sa aktivnostima

    @version 1.0
*/
class AktivnostiController extends Controller
{
    /*
        Marko Jovanovic 0635/2015

        Metoda koja prikazuje sve aktivnosti
        $aktivnosti - Niz aktivnosti
    */
    public function prikaziSve() {
        $aktivnosti = Aktivnost::all();
        return view("aktivnosti/index")->with("aktivnosti", $aktivnosti);
    }

    /*
        Marko Jovanovic 0635/2015
        Veljko Djordjevic 0431/2015

        Metoda koja prikazuje aktivnosti koje su rezultat pretrage
        $naziv - String
        $aktivnosti - Niz aktivnosti
    */
    public function prikaziAktivnosti(Request $request) {
        $naziv = $request->input("naziv");
        $aktivnosti = Aktivnost::where("naziv", "LIKE", "%".$naziv."%")->get();
        return view("aktivnosti/prikazi")->with("aktivnosti", $aktivnosti);
    }

    /*
        Marko Jovanovic 0635/2015

        Metoda koja prikazuje odredjenu aktivnost na posebnoj stranici
        $aktivnost - Aktivnost
    */
    public function prikaziAktivnost($id) {
        $aktivnost = Aktivnost::find($id);
        return view("aktivnosti/prikaziAktivnost")->with("aktivnost", $aktivnost);
    }

    /*
        Marko Jovanovic 0635/2015

        Metoda koja kreira aktivnost
        $naziv - string
        $tip - string
        $mesto - string
        $opis - string
        $datumOd - date
        $datumDo - date
    */
    public function kreirajAktivnost(Request $request) {
        $this->validate($request, [
            'naziv' => 'required',
            'tip' => 'required',
            'mesto' => 'required',
            'datumOd' => 'required',
            'opis' => 'nullable'
        ]);
        $aktivnost = new Aktivnost;
        $aktivnost->naziv = $request->input("naziv");
        $aktivnost->tip = $request->input("tip");
        $aktivnost->mesto = $request->input("mesto");
        if($request->input("opis") != null){
            $aktivnost->opis = $request->input("opis");
        }
        else{
            $aktivnost->opis = " ";
        }
        $aktivnost->datumOd = $request->input("datumOd");
        $aktivnost->datumDo = '2100-01-01';
        
        $aktivnost->save();
        
        return redirect("prikaziSveAktivnosti")->with("success", "Kreirana aktivnost");
    }

    /*
        Veljko Djordjevic 0431/2015

        Metoda koja prikazuje sve aktivnosti koje se nisu nemaju zavrsni datum
    */

    public function prikaziSveTekuceAktivnosti() {

        $aktivnosti = Aktivnost::whereDate('datumDo', '2100-01-01')->get();
        return view("aktivnosti/prikaziTekuce")->with("aktivnosti", $aktivnosti);
    }
    /*
        Veljko Djordjevic 0431/2015

        Metoda koja prikazuje sve volontere koji ucestvuju u datoj aktivnosti
    */
    public function prikaziVolontereOdredjeneAktivnosti($parametar) {
        $aktivnost = Aktivnost::find($parametar);
        $aktivnost->datumDo = \Carbon\Carbon::now();
        $aktivnost->save();
        $ucesca = Ucesce::where('idAktivnost','=',$parametar)->get();
        return view("aktivnosti/prikaziVolontereTek")->with("ucesca",$ucesca);
    }
}
