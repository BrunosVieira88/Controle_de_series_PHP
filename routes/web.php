<?php
namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
$rota ='/entrar';

Route::get('/series', 'SeriesController@index')->name('listar_series');
Route::get('/series/criar', 'SeriesController@create')->name('form_criar_serie')->middleware('auth');
Route::post('/series/criar', 'SeriesController@store')->middleware('auth');
Route::delete('/series/{id}', 'SeriesController@destroy')->middleware('auth');
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome')->middleware('auth');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');

Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get($rota, 'EntrarController@index');
Route::post($rota, 'EntrarController@entrar');
Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');
Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});
Route::get('/mail', function(){
    return new Mail\NovaSerie('GOT','8','10');
});

Route::get('/enviarMail', function(){

    $email= new Mail\NovaSerie('GOT','8','10');
    $user = (object)[
        'email'=>'bruno@tantofaz.com',
        'name'=>'Brunão das Massas'
    ];
    \Illuminate\Support\Facades\Mail::to($user)->send($email);

    return redirect('/mail');
   
});