<?php
/*
    Srdjan Skorkovic 0329/15
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Obucenost;
use App\VolObucenost;
use App\User;
use DB;

/*
Srdjan Skorkovic 0329/15

Klasa za kontrolu obucenosti
Generisane su kompletno sve funkcije generika koje mogu biti opciono iskoriscene
*/

class ObucenostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("obucenost.listavolontera");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obucenost.createobuc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    Srdjan Skorkovic 0329/15

    funkcija za smestanje obucenosti u bazu
    $obucenost predstavlja objekat obucenosti koji ce dobiti potrebne vrednosti atributa i zatim biti smesten u bazu
    funkcija vraca poruku o uspehu
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'naziv' => 'required|unique:obucenosts',
        ]);
        $obucenost = new Obucenost;
        $obucenost->naziv = $request->input('naziv');
        if($obucenost->naziv != null){
            $postojeca = \App\Obucenost::where('naziv', $obucenost->naziv)->get();
            if($postojeca->count() == 0){
                $obucenost->save();
            }
        }
        return redirect("kreirajObucenost")->with("success", "Obucenost kreirana");
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
         <td> <a href="obucenost/zabeleziobucenost/'.$row->id.'" class="btn btn-primary"> Zabelezi obucenost </a> </td>
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


    public function zabeleziObucenost($id){
        $korisnikID = $id;
        $obucenosti = Obucenost::all();
        return view('obucenost.zabeleziobucenost')->with('korisnikID', $korisnikID)->with('obucenosti', $obucenosti);
    }

    public function potvrdi($korisnikID, $obucenostID){  
        if(Auth::user()->pravaPristupa != 'V'){
            $obucenost = Obucenost::find($obucenostID);
            if($obucenost == null){
                return redirect('listavolontera')->with("error", "Nepostojeca obucenost!");
            }
            $korisnik = User::find($korisnikID);
            if($korisnik == null){
                return redirect('listavolontera')->with("success", "Nepostojeci volonter!");
            }
            $obucenostPostoji = VolObucenost::where('idVolonter','=', $korisnikID)->where('idObucenost','=', $obucenostID)->count();
            if($obucenostPostoji == 0){
                $volObucenost = new VolObucenost;
                $volObucenost->idVolonter = $korisnikID;
                $volObucenost->idObucenost = $obucenostID;
                $volObucenost->godina = date("Y");
                $volObucenost->opis = "Dobar je";
                $volObucenost->save();
                return redirect('listavolontera')->with("success", "Uspesno zabelezena obucenost!");
            }
            else{
                return redirect('listavolontera')->with("error", "Obucenost je vec zabelezena!");
            }
        }
        return redirect("profil");
    }
}
