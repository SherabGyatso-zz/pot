<?php

namespace App\Http\Livewire\Occupation;

use Livewire\Component;
use App\Models\Occupation;

class Newoccupation extends Component
{
	public $name;

	protected $rules = [
		'name' => 'required|regex:/^[a-zA-Z]+$/u|min:3|unique:countries,name',
	];

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

	public function addOccupation()
	{
		$validatedData = $this->validate();

		Occupation::create($validatedData);
		session()->flash('success', 'Occupation successfully added.');
		$this->emit('occupationAdded');

		$this->resetForm();
	}

	private function resetForm()
	{
		$this->name  = '';
	}

	public function render()
	{
		return view('livewire.occupation.newoccupation');
	}
}
