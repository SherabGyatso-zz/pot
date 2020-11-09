<div>
  <form wire:submit.prevent="updateCountry" class="p-3">
    <h1 class="text-xl">Update country</h1>
    @if (session()->has('success'))
    <div id='flash' class="mt-2 mb-2">
      <div class="p-2 text-green-500 inline rounded">
        {{ session('success') }}
      </div>
    </div>
    @endif

    <div>
      <label for="name" class="w-full block">Country name</label>
      <input wire:model.defer="name" type="text" class="w-full p-2 border border-solid border-gray">
      @error('name') <span class="error text-red-600 text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="mt-2">
      <button type="button" id="editModalClose" class="px-4 py-2 border rounded bg-gray-100 text-black modal-close">Close</button>
      <button type="submit" class="p-2 px-4 bg-green-400 rounded text-white">Update</button>
    </div>
  </form>
</div>

@push('scripts')
<script>
  document.addEventListener('livewire:load', function() {
    const editModal = document.querySelector('.edit-modal');
    const closeBtn = document.querySelector('button#editModalClose');

    closeBtn.addEventListener('click', () => {
      editModal.classList.add('close');
      removeFlash();
    })

    function removeFlash() {
      const flash = document.querySelector('#flash');
      if (flash) {
        console.log('Removeing flash');
        flash.remove();
      }
    }
  });
</script>
@endpush
