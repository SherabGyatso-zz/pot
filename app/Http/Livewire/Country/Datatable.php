<?php

namespace App\Http\Livewire\Country;

use App\Models\Country;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
  use WithPagination;

  public $sortBy = 'name';

  public $sortDirection = 'asc';

  public $perPage = 10;

  public $search = '';

  public $countrySelectedForEdit;

  public $openEditDialog = false;

  public $selectedCountryIdForDeletion;

  protected $listeners = ['countryAdded', 'updatedCountry', 'confirmDelete'];

  public function updatedCountry() {
    $this->resetPage();
  }

  public function countryAdded() {
    $this->resetPage();
  }

  public function openEditModal(Country $country) {
    $this->emit('selectCountry', $country->id);
    $this->dispatchBrowserEvent('openEditDialog');
  }

  public function openDeleteModal($id) {
    $this->selectedCountryIdForDeletion = $id;
    $this->dispatchBrowserEvent('showDeleteModal');
  }

  public function confirmDelete() {
    Country::destroy($this->selectedCountryIdForDeletion);
    $this->dispatchBrowserEvent('hideDeleteModal');
  }

  public function render()
  {
    $countries = Country::query()
      ->search($this->search)
      ->orderBy($this->sortBy, $this->sortDirection)
      ->paginate($this->perPage);

    return view('livewire.country.datatable', [
      'countries' => $countries
    ]);
  }

  public function sortBy($field)
  {
    if ($this->sortDirection == 'asc') {
      $this->sortDirection = 'desc';
    } else {
      $this->sortDirection = 'asc';
    }
    return $this->sortBy = $field;
  }

  public function updatingSearch()
  {
    $this->resetPage();
  }

  public function deleteCountry($id)
  {
    Country::find($id)->delete();
    session()->flash('success','Country deleted successfully!');
  }
}
