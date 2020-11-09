<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Prisoner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AddPrisoner extends Component
{
    public $name;
    public $phoneNumber;
    public $gender;
    public $countries;
    public $countryOfResidence;

    public function addPrisoner() {
      $this->validate([
        'name' => 'required|min:6',
        'gender' => 'required'      ]);


      $prisoner = Prisoner::create([
        'name' => $this->name,
        'gender' => $this->gender,
        'phone_number' => $this->phoneNumber,
        'country_id' => $this->countryOfResidence
      ]);

      if ($prisoner) {
        session()->flash('success', 'Prisoner successfully added.');
      } else {
        session()->flash('error', 'Prisoner could not be added.');
      }
    }

    public function mount() {
      $this->countries = Country::all();
      $this->countryOfResidence = $this->countries->first()->id;
    }

    public function render()
    {
        return view('livewire.prisoner.add-prisoner');
    }
}
