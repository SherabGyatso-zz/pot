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
        placeholder="Search Prisoners...">
    </div>
  </div>

  <div class="table-wrapper">
    <table class="table-auto w-full">
      <thead>
        <th wire:click="sortBy('name')" class="text-left p-2" style="cursor: pointer;">
          Name
          @include('partials._sort-icon',['field'=>'name'])
        </th>
        <th wire:click="sortBy('gender')" class="text-center" style="cursor: pointer;">
          Gender
          @include('partials._sort-icon',['field'=>'gender'])
        </th>
        <th wire:click="sortBy('phone_number')" class="text-center" style="cursor: pointer;">
          Phone Number
          @include('partials._sort-icon',['field'=>'phone_number'])
        </th>
        <th class="text-center" style="cursor: pointer;">
          Country of Residence
          @include('partials._sort-icon',['field'=>'phone_number'])
        </th>
      </thead>
      <tbody>
        @foreach ($prisoners as $prisoner)
        <tr class="border border-gray-300 @if ($loop->index % 2 != 0) bg-gray-100 @endif">
          <td class="px-2 py-2">{{ $prisoner->name }}</td>
          <td class="text-center">{{ $prisoner->gender }}</td>
          <td class="text-center">{{ $prisoner->phone_number }}</td>
          <td class="text-center">{{ $prisoner->country_id }}
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-2">
      <p>
        {{ $prisoners->links() }}
      </p>
    </div>
</div>
