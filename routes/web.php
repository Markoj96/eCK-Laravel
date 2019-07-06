<?php
/*
fajl koji je menjan od strane svih clanova tima
*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/kreirajAktivnost','AktivnostiController@kreirajAktivnost');

Route::post('/prikaziAktivnosti', 'AktivnostiController@prikaziAktivnosti');

Route::get('/aktivnosti/{id}', 'AktivnostiController@prikaziAktivnost');

Route::get('/kreiraj', function () {
    return view('aktivnosti/kreiraj');
});

Route::get('/', 'HomeController@index');

Route::get('/prikaziSveAktivnosti', 'AktivnostiController@prikaziSve');
Route::get('/prikaziTekuce', 'AktivnostiController@prikaziSveTekuceAktivnosti');
Route::get('/volonteriOdredjeneAktivnosti/{parametar}/edit', 'AktivnostiController@prikaziVolontereOdredjeneAktivnosti');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profil', 'ProfiliController@index');

Route::post('/profilIzmena', 'ProfiliController@sacuvajIzmene')->name('profilIzmena');

Route::get('/izmena', function() {
    return view('profili/izmena');
})->name('izmena');

Route::get('/ucesce/create/{parametar}', 'UcesceController@create');

Route::get('/volonteri', 'VolonteriController@index');
Route::get('/volonteri/pretraga', 'VolonteriController@livePretraga')->name('live.pretraga');

Route::get('/volonteri/prikaziVolontera/{id}', 'VolonteriController@prikaziVolontera');
Route::get('/volonteri/aktivnostiVolontera/{id}', 'VolonteriController@aktivnostiVolontera');
Route::get('/volonteri/izmeniVolontera/{id}', 'VolonteriController@izmeniVolontera');
Route::post('/volonteri/volonterIzmena', 'VolonteriController@sacuvajIzmene')->name('volonterSacuvaj');
Route::post('/volonteri/volonterPrava', 'VolonteriController@volonterPrava');

Route::get('/kreirajObuku','ObukeController@create');
Route::resource('obuke', 'ObukeController');

Route::get('/kreirajObucenost','ObucenostController@create');
Route::resource('obucenost', 'ObucenostController');

Route::get('/kreirajSeminar','SeminariController@create');
Route::resource('seminar', 'SeminariController');

Route::get('/seminar/{id}', 'SeminariController@show');

Route::get('/prikaziTekuceSeminare','SeminariController@index');

Route::get('/createVolSeminar/{id}','SeminariController@createVolSeminar');


Route::get('/statistika', 'StatistikeController@index')->name('statistika');


Route::get('/listavolontera', 'ObucenostController@index');
Route::get('/pretraga', 'ObucenostController@livePretraga')->name('live.obucenost');

Route::get('/obucenost/zabeleziobucenost/{id}', 'ObucenostController@zabeleziObucenost');
Route::get('/obucenost/potvrdi/{korisnikID}/{obucenostID}', 'ObucenostController@potvrdi');

Route::get('/pregledseminara', 'SeminariController@listaSeminara');
Route::get('/seminar/listavolontera/{id}', 'SeminariController@listaVolontera');
