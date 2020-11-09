<div>
  <form wire:submit.prevent="updateOccupation">
    <div class="mt-2 mb-2">
        @if (session()->has('success'))
            <div class="p-2 inline rounded text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
        <div class="p-2 bg-red-500 inline rounded text-white">
            {{ session('error') }}
        </div>
        @endif
    </div>

    <div class="p-2">
      <label for="name" class="w-full block">Occupation name</label>
      <input wire:model.defer="name" type="text" class="p-2 border border-solid border-gray">
      @error('name') <span class="error text-red-600 text-xs">{{ $message }}</span> @enderror
      <button type="submit" class="p-2 px-4 bg-red-500 rounded text-white">Update</button>
    </div>
  </form>
</div>
