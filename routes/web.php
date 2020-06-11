<?php

use App\Lead;
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


Auth::routes();
Route::get('/', function () {return view('welcome');});
Route::get('/home/{lang}', 'HomeController@index')->name('home');
Route::get('/home/update/{lang}', 'HomeController@update')->name('update');

Route::post('/home/{lang}', 'HomeController@recordLogo')->name('recordLogo');
Route::post('/home/delete/{lang}', 'HomeController@deleteLogo')->name('deleteLogo');

// conexion por linkedin
//Route::get('auth/callback/{provider}', 'SocialAuthController@callback');
//Route::get('auth/redirect/{provider}', 'SocialAuthController@redirect');

// recuperacion de salesforce a la bbdd de la web
/*Route::any('imports', function()
{
    $LeadsSalesforce = Lead::all();
     // Hablar con carlos diez para filtrar SOLO los que acceden al salesforce de la prueba
    foreach ($LeadsSalesforce as $LeadSalesforce){
        $LeadSalesforce->Id;
    }
    return redirect('/' );
});*/

//Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
//Route::get('/callback/{provider}', 'SocialController@callback');
