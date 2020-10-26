<?php

use Illuminate\Support\Facades\Route;
use Algolia\AlgoliaSearch\SearchIndex;
use App\Apartment;




// require __DIR__ . '/vendor/autoload.php';

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





Route::get('/', function () {
    return view('welcome');
});

Route::get('/prova.php', function (Request $request) {
            if($request->ajax()){

                return view('prova');
            }

});
// Route::get('/ciao', function () {
//     return view('ciao');
//
// });

Auth::routes();

Route::get('/api/apartments/all', 'ApartmentController@getAllApartments') ->name('apart.all');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ciao', 'HomeController@ciao')->name('ciao');
Route::get('/sea', 'ApartmentController@search')->name('search.apartment');
Route::get('/sea2', 'ApartmentController@search2')->name('search.apartment2');


Route::get('/sea3', 'ApartmentController@create')->name('apart.create');

Route::get('search', function() {

  //********************* SETUP ALGOLIA LARAVEL  ***************************
  require __DIR__ . '/../vendor/autoload.php';

  $client = new \AlgoliaSearch\Client('LIKNMZQ86D','0c94464660cf89fcf35226a37144afbf');
  $index = $client->initIndex('myApartments');

  //********************* END OF SETUP ALGOLIA LARAVEL ***************************


  //********************* PUSHING DATA IN ALGOLIA ***************************
  $apartments = Apartment::all()->toArray();

  $objects = [];

  foreach ($apartments as $apartment) {
    array_push(
      $objects,[
      "id" => $apartment['id'],
      "city" => $apartment['city'],
      "_geoloc" => [
        'lat' => $apartment['lat'],
        'lng' => $apartment['lng']
      ]
    ]
  );
  }
  $index->addObjects($objects); // forse invece di addObjects esiste update (DA VEDERE)
  //********************* END OF PUSHING DATA IN ALGOLIA ***************************

//********************* SEARCHING WITH PHP ***************************
  // $results = $index->search('', [
  // 'aroundLatLng' => [-36.940696, -106.64684],
  // 'aroundRadius' => 2000000,// 20 km
  // 'hitsPerPage' => 20
  // ]);
  // $hits = $results["hits"];
  // return view('welcome', compact('hits'));
  //********************* END OF SEARCHING WITH PHP ***************************

  return view('welcome');



});
