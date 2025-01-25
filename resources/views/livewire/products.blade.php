<div>
    <x-cards.card-header > {{ $header }}</x-cards.card-header>

    <div class="flex flex-wrap justify-center items-center gap-5 mx-auto max-w-[1200px]">
        @foreach($items as $item)
            <x-cards.card :item="$item" />
        @endforeach
    </div>
    <div class="my-16 mx-auto flex justify-center items-center max-w-[992px] gap-6">
        <button wire:click="previousPage('{{ $pageName }}')" wire:loading.attr="disabled" class="bg-primary-green hover:bg-dark-green text-white px-4 py-2 rounded-lg shadow transition duration-300 cursor-pointer  disabled:bg-dark-green disabled:opacity-75 disabled:cursor-default" @if ($items->onFirstPage()) disabled @endif>
            << Previous
        </button>
        <div class="text-gray-800 text-xl">
            عرض
            <span class="font-bold">{{ $items->firstItem() }}</span>
            إلى
            <span class="font-bold">{{ $items->lastItem() }}</span>
            من
            <span class="font-bold">{{ $items->total() }}</span>
            النتائج
        </div>
        <button wire:click="nextPage('{{ $pageName }}')" wire:loading.attr="disabled" class="bg-primary-green hover:bg-dark-green text-white px-4 py-2 rounded-lg shadow transition duration-300 cursor-pointer disabled:bg-dark-green disabled:opacity-75 disabled:cursor-default" @if (!$items->hasMorePages()) disabled @endif>
            Next >>
        </button>
    </div
</div>
