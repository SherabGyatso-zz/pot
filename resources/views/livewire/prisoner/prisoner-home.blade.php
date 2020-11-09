<div class="p-10">

  <button wire:click="showAddPrisonerForm" class="float-right p-2 px-4 bg-blue-500 text-white rounded">
    + Add new prisoner
  </button>

  <button wire:click="showPrisonerList" class="float-right p-2 px-4 bg-gray-300 text-black text-white rounded mr-2">
    Show list
  </button>

  <br><br>

  @if ($showAddPrisonerForm)
    <livewire:add-prisoner />
  @endif

  @if ($showPrisonerDataTable)
    <livewire:prisoner-list />
  @endif
</div>
