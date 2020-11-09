<?php

namespace App\Http\Livewire\Occupation;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Models\Occupation;
use Livewire\WithPagination;

class Datatable extends Component
{
	use WithPagination;

	public $sortBy = 'name';

	public $sortDirection = 'asc';

	public $perPage = 10;

	public $search = '';

	protected $listeners = ['occupationAdded', 'updatedOccupation'];

	public function updatedOccupation() {
    $this->resetPage();
	}
	
	public function occupationAdded() {
		$this->resetPage();
	}

	public function showEditPage(Occupation $occupation) {
		$this->emitUp('showEditPage', $occupation);
	}

	public function render()
	{
		$occupations = Occupation::query()
			->search($this->search)
			->orderBy($this->sortBy, $this->sortDirection)
			->paginate($this->perPage);

		return view('livewire.occupation.datatable', [
			'occupations' => $occupations
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
	
	public function deleteOccupation($id)
  {
    Occupation::find($id)->delete();
    session()->flash('success','Occupation deleted successfully!');
  }
}
