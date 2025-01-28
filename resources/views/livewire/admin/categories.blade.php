<div>
    <header class="flex flex-row items-center justify-between  p-3 bg-white rounded-md shadow-sm">
        <h2 class="font-semibold"> Categories ({{ $categories->count() }}) </h2>
        <a href="/admin/categories/create" wire:navigate class="bg-primary-green hover:bg-dark-green transition duration-300 text-white py-1 px-3 rounded-md"> + Add Category </a>
    </header>


    <div class="my-10">
       <livewire:admin.search-category  />
    </div>
</div>
