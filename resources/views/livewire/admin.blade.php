
<div class="grid grid-cols-4 py-12">
  <div class="row-start-1 col-start-1 col-span-1 max-w-7xl sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
      <nav class="mt-2">
        <a class="px-2 py-2 border-b-1 rounded block w-full hover:bg-gray-300 hover:text-white @if ($showCountries) bg-blue-400 text-white @endif" href="#" wire:click="showCountriesPage">Countries</a>
        <a class="px-2 py-2 border-b-1 rounded block w-full hover:bg-gray-300 hover:text-white @if ($showOccupations) bg-blue-400 text-white @endif" href="#" wire:click="showOccupationsPage">Occupations</a>
        
        <a class="px-2 py-2 border-b-1 rounded block w-full hover:bg-gray-300 hover:text-white" href="#">Qualifications</a>
        <a class="px-2 py-2 border-b-1 rounded block w-full hover:bg-gray-300 hover:text-white" href="#">County</a>
        <a class="px-2 py-2 border-b-1 rounded block w-full hover:bg-gray-300 hover:text-white" href="#">Towns</a>
        <a class="px-2 py-2 border-b-1 rounded block w-full hover:bg-gray-300 hover:text-white" href="#">Villages</a>
        <a class="px-2 py-2 border-b-1 rounded block w-full hover:bg-gray-300 hover:text-white" href="#">Prisons</a>
        <a class="px-2 py-2 border-b-1 rounded block w-full hover:bg-gray-300 hover:text-white" href="#">Prisoners-category</a>
        <a class="px-2 py-2 border-b-1 rounded block w-full hover:bg-gray-300 hover:text-white" href="#">Status</a>
        <a class="px-2 py-2 border-b-1 rounded block w-full hover:bg-gray-300 hover:text-white" href="#">Attachment-category</a>
        <a class="px-2 py-2 border-b-1 rounded block w-full hover:bg-gray-300 hover:text-white" href="#">ID types</a>
      </nav>
    </div>
  </div>

  <div class="col-start-2 col-span-3 max-w-7xl sm:px-6 lg:px-8 h-screen">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
      @if ($showCountries) <livewire:country.index />  @endif
      @if ($showOccupations) <livewire:occupation.index /> @endif
    </div>
  </div>
</div>
