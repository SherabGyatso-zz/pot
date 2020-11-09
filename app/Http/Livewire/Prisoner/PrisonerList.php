<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prisoner;
use Livewire\WithPagination;

class PrisonerList extends Component
{
  use WithPagination;

  public $sortBy = 'name';

  public $sortDirection = 'asc';

  public $perPage = 10;

  public $search = '';

  public function render()
  {
    $prisoners = Prisoner::query()
      ->search($this->search)
      ->orderBy($this->sortBy, $this->sortDirection)
      ->paginate($this->perPage);

    return view('livewire.prisoner.prisoner-list', [
      'prisoners' => $prisoners
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
}
