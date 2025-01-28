<div>
    <header class="flex flex-row items-center justify-between  p-3 bg-white rounded-md shadow-sm">
        <h2 class="font-semibold"> Customers ({{ $customers->count() }}) </h2>
        <a href="#" wire:navigate class="bg-primary-green hover:bg-dark-green transition duration-300 text-white py-1 px-3 rounded-md"> + Add Customer </a>
    </header>

    <div class="my-10">
        <livewire:admin.search-customers :customers="$customers" />
    </div>
</div>
