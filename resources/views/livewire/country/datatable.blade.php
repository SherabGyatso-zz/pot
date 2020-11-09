<div>
  <div class="mt-2 mb-2">
    @if (session()->has('success'))
        <div class="p-2 inline rounded text-red-600">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
    <div class="p-2 bg-red-500 inline rounded text-white">
        {{ session('error') }}
    </div>
    @endif
  </div>
  <div class="flex justify-between items-center p-2 mb-4">
    <div class="col form-inline ">
      Per Page: &nbsp;
      <select wire:model="perPage" class="form-control border border-solid">
        <option>10</option>
        <option>20</option>
        <option>50</option>
        <option>100</option>
      </select>
    </div>

    <div>
      <input wire:model.debounce.300ms="search" class="form-control p-2 border rounded" type="text"
        placeholder="Search Countries...">
    </div>
  </div>

  <div class="table-wrapper">
    <table class="table-auto w-full">
      <thead>
        <th wire:click="sortBy('name')" class="text-left p-2" style="cursor: pointer;">
          Name
          @include('partials._sort-icon',['field'=>'name'])
        </th>
        <th>

        </th>
      </thead>
      <tbody>
        @foreach ($countries as $country)
        <tr class="border border-gray-300 @if ($loop->index % 2 != 0) bg-gray-100 @endif">
          <td class="px-2 py-2">{{ $country->name }}</td>
          <td><button wire:click="openEditModal({{ $country }})" class="text-blue-600">Edit</button></td>
          <td><button wire:click="openDeleteModal({{ $country->id }})" class="text-red-600">Delete</button></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-2">
      <p>
        {{ $countries->links() }}
      </p>
    </div>
  </div>
</div>

@push('modals')
<div class="modal-container edit-modal close">
  <div class="overlay border border-solid border-blue-600">
  </div>

  <div class="modal-dialog border rounded">
    <div class="modal p-2 rounded-md shadow-md border">
      <livewire:country.edit/>
    </div>
  </div>
</div>

<div class="modal-container delete-modal close">
  <div class="overlay border border-solid border-blue-600">
  </div>

  <div class="modal-dialog border rounded">
    <div class="modal p-2 rounded-md shadow-md border">

      <div class="p-4">
        <p class="text-lg">Are you sure you want to delete?</p>

        <div class="mt-2">
          <button id="closeDelete" class="px-4 py-2 bg-gray-100 text-black border rounded float">Cancel</button>
          <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white border rounded">Confirm</button>
        </div>
      </div>

    </div>
  </div>
</div>
@endpush

@push('scripts')
<script>
  document.addEventListener('livewire:load', function () {
    const editModal = document.querySelector('.edit-modal');
    const deleteModal = document.querySelector('.delete-modal');
    const closeDeleteModalBtn = document.querySelector('#closeDelete');
    const confirmDeleteBtn = document.querySelector('#confirmDelete');

    window.addEventListener('openEditDialog', () => {
      editModal.classList.remove('close');
    });

    window.addEventListener('showDeleteModal', () => {
      deleteModal.classList.remove('close');
    })

    window.addEventListener('hideDeleteModal', () => {
      deleteModal.classList.add('close');
    })

    closeDeleteModalBtn.addEventListener('click', () => {
      deleteModal.classList.add('close');
    })

    confirmDeleteBtn.addEventListener('click', () => {
      window.livewire.emit('confirmDelete');
    })
  });
</script>
@endpush




