<?php

namespace App\Http\Livewire\Country;

use App\Models\Country;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Edit extends Component
{
  public $country;
  public $name;

  protected $listeners = ['selectCountry'];

  public function selectCountry($countryId) {
    $this->country = Country::find($countryId);
    $this->name = $this->country->name;
  }

  public function updateCountry() {
    $this->validate([
      'name' => 'required|min:3|unique:countries,name,' . $this->country->id
    ]);

    $updateCountry = Country::find($this->country->id);
    $updateCountry->update(['name' => $this->name]);
    $this->emit('updatedCountry');
    session()->flash('success', 'Updated country successfully.');
  }

  public function render()
  {
    return view('livewire.country.edit');
  }
}
