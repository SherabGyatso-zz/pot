<div class="p-3">
  <form wire:submit.prevent="addCountry" class="p-2">
    <h1 class="text-xl">Add new country</h1>

    <div class="mt-2 mb-2">
        @if (session()->has('success'))
            <div class="p-2 text-green-500 inline rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
        <div class="p-2 bg-red-500 inline rounded text-white">
            {{ session('error') }}
        </div>
        @endif
    </div>

    <div>
      <label for="name" class="w-full block">Country name</label>
      <input wire:model="name" type="text" class="w-full p-2 border border-solid" placeholder="Enter fullname">
      @error('name') <span class="error text-red-600 text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="mt-2">
      <button type="button" id="closeAddNewModal" class="px-4 py-2 border rounded bg-gray-100 text-black modal-close">Close</button>
      <button type="submit" class="p-2 px-4 bg-blue-500 rounded text-white">Submit</button>
    </div>
  </form>
</div>
