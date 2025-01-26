<div>
    <header class="flex flex-row items-center justify-between  p-3 bg-white rounded-md shadow-sm">
        <h2 class="font-semibold"> Products ({{ $products->count() }}) </h2>
        <a href="/admin/products/create" wire:navigate class="bg-primary-green hover:bg-dark-green transition duration-300 text-white py-1 px-3 rounded-md"> + Add Product </a>
    </header>

    <div class="my-10">
         <livewire:admin.search-product />
    </div>
</div>
