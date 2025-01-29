<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <input
        type="text"
        placeholder="Search Products"
        wire:model.live="searchText"
        class="bg-neutral-600 rounded-md px-3 py-2 pl-10 w-full placeholder:text-neutral-400 outline-none "
    />

    <!-- Results Section -->
     <livewire:search-item-results :results="$results" :show="!empty($searchText)"/>
</div>
