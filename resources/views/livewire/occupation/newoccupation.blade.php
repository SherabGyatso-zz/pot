<div>
  <form wire:submit.prevent="addOccupation">

    <div class="mt-2 mb-2">
        @if (session()->has('success'))
            <div class="p-2 inline rounded text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
        <div class="p-2 inline rounded text-red-600">
            {{ session('error') }}
        </div>
        @endif
    </div>


    <div class="p-2">
      <label for="name" class="w-full block">Occupation name</label>
      <input wire:model="name" type="text" class="p-2 border border-solid border-gray" placeholder="Enter fullname">
      @error('name') <span class="error text-red-600 text-xs">{{ $message }}</span> @enderror

      <button type="submit" class="p-2 px-4 bg-blue-500 rounded text-white">Add</button>
    </div>
  </form>
</div>
