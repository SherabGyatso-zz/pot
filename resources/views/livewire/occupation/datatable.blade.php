<div>
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
        placeholder="Search Occupations...">
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
        @foreach ($occupations as $occupation)
        <tr class="border border-gray-300 @if ($loop->index % 2 != 0) bg-gray-100 @endif">
          <td class="px-2 py-2">{{ $occupation->name }}</td>
          <td><button wire:click="showEditPage({{ $occupation }})" class="text-blue-600">Edit</button></td>
          <td> <button onclick="confirm('Are you sure you want to remove the occupation?') || event.stopImmediatePropagation()" wire:click="deleteOccupation({{ $occupation->id }})" class="text-red-600">Delete</button> </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-2">
      <p>
        {{ $occupations->links() }}
      </p>
    </div>
  </div>
</div>
