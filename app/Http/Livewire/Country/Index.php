<?php

namespace App\Http\Livewire\Country;

use App\Models\Country;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Index extends Component
{
  public $showList = true;
  public $showAddCountryForm = false;
  public $showEdit = false;
  public $selectedCountry;

  protected $listeners = ['showEditPage'];

  public function showAddNewModal() {
    $this->dispatchBrowserEvent('showAddNewModal');
  }

  public function closeAddNewModal() {
    $this->dispatchBrowserEvent('hideAddNewModal');
  }

  public function showList() {
    $this->showList = true;
    $this->showAddCountryForm = false;
  }

  public function render() {
    return view('livewire.country.index');
  }
}
