<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Apartment extends Model
{
  // use Searchable;

  // public function searchableAs()
  //   {
  //       return 'customized_table_name';
  //   }

  protected $fillable = [
    'city',
    'lat',
    'lng'
  ];
}
