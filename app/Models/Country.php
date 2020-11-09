<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

  use HasFactory;

  protected $fillable = ['name'];


  public function scopeSearch($query, $val)
  {
    return $query
      ->where('name', 'like', '%' . $val . '%');
  }

  public function prisoners()
  {
      return $this->hasMany('App\Models\Prisoner');
  }
}
