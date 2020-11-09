<?php

namespace App\Http\Livewire;

use App\Models\Prisoner;
use Livewire\Component;

class PrisonerHome extends Component
{
    public $showAddPrisonerForm = false;
    public $showPrisonerDataTable = true;

    public function showAddPrisonerForm() {
      $this->showAddPrisonerForm = true;
      $this->showPrisonerDataTable = false;
    }

    public function showPrisonerList() {
      $this->showAddPrisonerForm = false;
      $this->showPrisonerDataTable = true;
    }

    public function render()
    {
      $prisoners = Prisoner::all();
      return view('livewire.prisoner.prisoner-home', ['prisoners' => $prisoners]);
    }
}
