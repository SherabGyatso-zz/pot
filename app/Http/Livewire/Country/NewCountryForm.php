<?php

namespace App\Http\Livewire\Country;

use App\Models\Country;
use Livewire\Component;

class NewCountryForm extends Component
{
  public $name;

  protected $rules = [
    'name' => 'required|regex:/^[a-zA-Z]+$/u|min:3|unique:countries,name',
  ];

  public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

  public function addCountry() {
    $this->validate([
      'name' => 'required|unique:countries|min:3'
    ]);

    Country::create(['name' => $this->name]);
    $this->emit('countryAdded');
    $this->resetForm();
    session()->flash('success', 'Country successfully added.');
  }

  private function resetForm()
  {
      $this->name  = '';
  }

  public function render()
  {
      return view('livewire.country.new-country-form');
  }
}
