<div>
  <button wire:click="showAddNewModal" class="add-new px-4 py-2 bg-blue-500 border rounded text-white float-right">+ Add new country</button><br><br>

  <livewire:country.datatable />
</div>

@push('modals')
<div class="modal-container add-new-country close">
  <div class="overlay border">
  </div>

  <div class="modal-dialog">
    <div class="modal p-2 rounded-md shadow-md border bg-black">
      <livewire:country.new-country-form />
    </div>
  </div>
</div>
@endpush

@push('scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
      const addNewBtn = document.querySelector('button.add-new');
      const addNewModal = document.querySelector('.add-new-country');
      const closeAddNewModal = document.querySelector('button#closeAddNewModal');

      window.addEventListener('showAddNewModal', function() {
        addNewModal.classList.remove('close');
      });

      closeAddNewModal.addEventListener('click', function() {
        addNewModal.classList.add('close');
      });
    })
</script>
@endpush
