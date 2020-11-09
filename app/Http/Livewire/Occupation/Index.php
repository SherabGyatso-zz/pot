<?php

namespace App\Http\Livewire\Occupation;

use App\Models\Occupation;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
	public $showList = true;
	public $showAddOccupationForm = false;
	public $showEdit = false;
	public $selectedOccupation;

	protected $listeners = ['showEditPage'];

	public function showEditPage(Occupation $occupation) {
		Log::debug("Now showing occupation: " . $occupation);
		$this->showEdit = true;
		$this->showAddOccupationForm = false;
		$this->showList = false;
		$this->selectedOccupation = $occupation;
		$this->emit('refreshEditPage', $this->selectedOccupation);
	}

	public function showNewForm() {
		$this->showAddOccupationForm = true;
		$this->showList = false;
	}

	public function showList() {
		$this->showList = true;
		$this->showAddOccupationForm = false;
	}

	public function render() {
		return view('livewire.occupation.index');
	}
}
