<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prisoner extends Model
{
    protected $fillable = ['name', 'gender', 'phone_number', 'country_id'];

    use HasFactory;

    public function scopeSearch($query, $val)
    {
        return $query
        ->where('name','like','%'.$val.'%')
        ->Orwhere('gender','like','%'.$val.'%')
        ->Orwhere('phone_number','like','%'.$val.'%')
        ;
    }

    public function country() {
      return $this->belongsTo('App\Models\Country');
    }
}
