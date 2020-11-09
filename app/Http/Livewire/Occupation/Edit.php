<?php

namespace App\Http\Livewire\Occupation;

use App\Models\Occupation;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Edit extends Component
{
	public $occupation;
	public $name;

	protected $rules = [
		'name' => 'required|regex:/^[a-zA-Z]+$/u|min:3',
	];

	protected $listeners = ['refreshEditPage'];

  public function refreshEditPage(Occupation $occupation) {
		$this->occupation = $occupation;
		Log::debug("Refreshing edit page");
	}
	
	public function updateOccupation() {
    $this->validate();
    $this->occupation->name = $this->name;
    $this->occupation->save();
    session()->flash('success', 'Occupation successfully Edit.');
    $this->emit('updatedOccupation');
	}

	public function mount(Occupation $occupation) {
		Log::debug("Mounting with occupation: " . $occupation);
  }
	
	public function render()
	{
		$this->occupation = $this->occupation;
    $this->name = $this->occupation->name;
		return view('livewire.occupation.edit');
	}
}
