<?php

/*
    Milos Cubrilo 428/15
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ucesce;
use App\Aktivnost;
use DB;
/*
    Kontroler zaduzen za sve funkcionalnosti sa volonterima
*/

class VolonteriController extends Controller
{
     /**
      * v 1.0
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * v 1.0
     * Metoda koja prikazuje listu svih volontera
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view("volonteri.index");
    }

    /**
     * v 1.0
     * Metoda za prikazivanje informacija konkretnog volontera
     * @param $id predstavlja id volontera
     * $volonter dohvacen iz baze
     * @return \Illuminate\Http\Response
     */
    public function prikaziVolontera($id) {
        $volonter = User::find($id);
        return view("volonteri/prikaziVolontera")->with("volonter", $volonter);
    }

    /**
     * v 1.0
     * Metoda koja se koristi za live pretragu, kako korsnik unosi parametre 
     * vrsi se filtriranje volontera odnosno upit u bazu po parametrima koje korisnik unosi
     * @param $request
     * $output vrednost koja se vraca
     * $query parametar koji unosi korisnik
     * $data dohvaceni volonteri koji zadovoljavaju uslove upita
     * @return JSON representation of value
     */
    public function livePretraga(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('ime', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orWhere('prezime', 'like', '%'.$query.'%')
         ->orWhere('prebivaliste', 'like', '%'.$query.'%')
         ->orWhere('pol', 'like', '%'.$query.'%')
         ->orWhere('zanimanje', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
          //prikaz svih volontera
       $data = DB::table('users')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->id.'</td>
         <td>'.$row->ime.'</td>
         <td>'.$row->prezime.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->pol.'</td>
         <td>'.$row->prebivaliste.'</td>
         <td>'.$row->zanimanje.'</td>
         <td>'.$row->datumRodjenja.'</td>
         <td> <a href="volonteri/prikaziVolontera/'.$row->id.'" class="btn btn-primary"> Pogledaj profil </a> </td>
        </tr>
        ';
        }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">Nema rezultata.</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    /**
     * v 1.0
     * Meotda koja prikazuje sve aktivnsoti u kojima je ucestvovao volonter(za koje se prijavio)
     * @param $id id zeljenog volontera
     * $aktivnostiId lista idAktivnosti u kojima je taj volonter ucestvovao
     * $aktivnosti lista aktivnosti u kojima je ucestvovao volonter
     * $volonter dohvacen volonter da bi u view-u moglo da se ispise ime, prezime...
     * @return \Illuminate\Http\Response
     */
    public function aktivnostiVolontera($id){
        //iz ucesca dohvatimo gde god je idVolontera==id
        //imamo listu id Aktivnosti koju ispisemo
        $aktivnostiId=Ucesce::where("idVolontera",$id);
        $aktivnosti=array();
        $index=0;
        foreach($aktivnostiId as $aktivnostId ){
            $aktivnosti=array_add($aktivnosti,$index,Aktivnosti::find($aktivnostId));
            $index++;
        }
        $volonter=User::find($id);
        return view("volonteri/aktivnostiVolontera")->with("volonter",$volonter)->with("aktivnosti",$aktivnosti);
    }

    /**
     * v 1.0
     * Metoda koja prikazuje stranicu za izmene licnih podataka volontera
     * @param $id id volontera kojem se vrsi azuriranje/izmena
     * $volonter dohvacen volonter
     * @return \Illuminate\Http\Response
     */
    public function izmeniVolontera($id){
        $volonter=User::find($id);
        if((auth()->user()->pravaPristupa!='V')){
            return view("volonteri/volonterIzmena")->with("volonter",$volonter);
        }
        else{
            $user=User::find(auth()->user()->id);
            return view("welcome")->with("user",$user);
        } 
    }

    /**
     * v 1.0
     * Metoda koja unosi izmenje podatke(iz forme) u  bazu
     * @param $request
     * $user dohvacen volonter
     * $fileNameToStore naziv slike koja se cuva u direktorijumu public/fileToUpload
     * u ime dodato trenutno vreme, kako bi bilo jedinstveno u bazi
     * @return \Illuminate\Http\Response
     */
    public function sacuvajIzmene(Request $request)
    {
        $this->validate($request, [
            'ime' => 'required',
            'prezime' => 'required',
            'pol' => 'required',
            'zanimanje' => 'required',
            'fileToUpload' => 'image|nullable|max:1999'
        ]);
        $user = User::find($request->id);
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
        if($user!=null){

            $user->ime = $request->ime;
            $user->prezime = $request->prezime;
            $user->pol = $request->pol;
            $user->datumRodjenja = $request->datum;
            $user->prebivaliste = $request->prebivaliste;
            $user->zanimanje = $request->zanimanje;
            $user->pravaPristupa = $request->pravaPristupa;
            $user->slika = $fileNameToStore;
            $user->save();   
        }
        return view("volonteri/prikaziVolontera")->with("volonter", $user);
    }

    /*
    public function volonterPrava($id){
        $volonter=User::find($id);
        if($volonter!=null){
            $volonter->pravaPristupa = "M";
            $volonter->save();
        }
        return view("volonteri/prikaziVolontera")->with("volonter", $volonter);
    }
    */
}
