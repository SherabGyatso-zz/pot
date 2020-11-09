<div>
	@if (!$showEdit)
		<livewire:occupation.newoccupation />
	@else
		<livewire:occupation.edit :occupation="$selectedOccupation" />
	@endif
		<livewire:occupation.datatable />
</div>