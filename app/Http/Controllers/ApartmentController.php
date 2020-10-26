<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class ApartmentController extends Controller
{
  public function search() {

    return view('search-engine');

  }

  public function search2() {

    return view('search-engine2');

  }

  public function getAllApartments() {

    $apartments = Apartment::all();
    return response() -> json($apartments);
  }

  public function create() {

    create();
    $request
    $objects,[
    "id" => $request['id'],
    "city" => $request['city'],
    "_geoloc" => [
      'lat' => $request['lat'],
      'lng' => $request['lng']
    ]
  ]
  }

  $index->addObjects($objects);




}
