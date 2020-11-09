<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Admin extends Component
{

    public $showCountries = true;
    public $showOccupations = false;

    public function showOccupationsPage() {
      $this->showCountries = false;
      $this->showOccupations = true;
      $this->showRelationships = false;
    }

    public function showCountriesPage() {
      $this->showCountries = true;
      $this->showOccupations = false;
      $this->showRelationships = false;
    }

    // public function showRelationshipsPage() {
    //   $this->showCountries = false;
    //   $this->showOccupations = false;
    //   $this->showRelationships = true;
    // }

    public function render()
    {
        return view('livewire.admin');
    }
}
