<div class="h-screen">
  <h1 class="text-2xl">New prisoner record</h1>
  <form wire:submit.prevent="addPrisoner">

    <div class="mt-2 mb-2">
        @if (session()->has('success'))
            <div class="p-2 bg-green-400 inline rounded text-white">
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
      <label for="name" class="w-full block">Full name</label>
      <input wire:model="name" type="text" class="p-2 w-full border border-solid border-gray" placeholder="Enter fullname">
      @error('name') <span class="error text-red-600 text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="p-2">
      <label for="gender" class="w-full block">Gender</label>
      <input wire:model="gender" type="text" class="p-2 w-full border border-solid border-gray" placeholder="9802-242-2323">
      @error('gender') <span class="error text-red-600 text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="p-2">
      <label for="phone-number" class="w-full block">Phone number</label>
      <input wire:model="phoneNumber" type="text" class="p-2 w-full border border-solid border-gray" placeholder="9802-242-2323">
    </div>

    <div class="p-2">
      <label for="country" class="w-full block">Residence country</label>
      <select for="country" wire:model="countryOfResidence">
        @foreach ($countries as $country)
          <option value="{{ $country->id }}">{{ $country->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="p-2">
      <button type="submit" class="p-2 px-4 bg-blue-500 rounded text-white">Submit</button>
    </div>
  </form>
</div>
