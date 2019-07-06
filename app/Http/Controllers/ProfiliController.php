<?php
/*
    Marko Jovanovic 0635/2015
    Srdjan SKorkovic 329/15
*/  


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
    Marko Jovanovic 0635/2015

    Klasa sav rad sa profilom korisnika
*/
class ProfiliController extends Controller
{
    /* 
        Marko Jovanovic 0635/2015

        Metoda koja prikazuje volonterov profil sa svim njegovim informacijama

        $ime - string
        $prezime - string
        $pol - enum
        $datumRodjenja - date
        $prebivaliste - string
        $zanimanje - string
        $slika - file
    */
    public function index()
    {
        return view('profili/index');
    }

    /* 
        Marko Jovanovic 0635/2015

        Metoda koja cuva izmene informacija o profilu

        Srdjan Skorkovic 0329/15
        Dodat deo za validaciju prosledjenih parametara - ime, prezime, pol i zanimanje su obavezni, dok je slika opciona i odredjene velicine
        $user predstavlja postojeceg korisnika ciji se podaci menjaju, tj. nad kojima se vrsi update
    */
    public function sacuvajIzmene(Request $request)
    {
        $this->validate($request, [
            'ime' => 'required',
            'prezime' => 'required',
            'pol' => 'required',
            'zanimanje' => 'required',
            'prebivaliste' => 'required',
            'fileToUpload' => 'image|nullable|max:1999'
        ]);
        $user = Auth::user();
        if($request->hasFile('fileToUpload')){
            $fileNameWithExt = $request->file('fileToUpload')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('fileToUpload')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('fileToUpload')->storeAs('public/fileToUpload', $fileNameToStore);
        }
        else{
            $fileNameToStore = $user->slika;
        } 

        $user->ime = $request->ime;
        $user->prezime = $request->prezime;
        $user->pol = $request->pol;
        $user->datumRodjenja = $request->datum;
        $user->prebivaliste = $request->prebivaliste;
        $user->zanimanje = $request->zanimanje;
        $user->slika = $fileNameToStore;
        $user->save();

        return redirect('profil')->with("success", "Uspesna izmena profila");
    }
}
