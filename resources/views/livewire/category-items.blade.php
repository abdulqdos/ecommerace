<div>
    <x-cards.card-header > {{ $header }}</x-cards.card-header>
{{--    @dd($items);--}}
    <div class="flex flex-wrap justify-center gap-5 max-w-[1200px]">
        @foreach($items as $item)
            <div
                class="flex flex-col bg-white rounded-md w-1/3 max-w-xs gap-3 border border-gray-300 shadow-lg pb-4">
                <a
                    wire:navigate
                    href="{{ route('item.show' , ['item' => $item->id]) }}"
                    class="overflow-hidden">
                    <img
                        src="{{ $item->img_url  }}"
                        alt="Product Image"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-300 cursor-pointer"
                        onerror="this.onerror=null;this.src='https://picsum.photos/300/300?random={{ $item->id }}';"
                    />
                </a>
                <div class="flex flex-col justify-center gap-3 px-3">
                    <h2 class="text-lg text-black font-semibold"> {{ $item->name }} </h2>
                    <p class="text-gray-400 hover:text-primary-green">  $ {{ $item->price }} </p>
                    <p class="text-gray-600 hover:text-primary-green cursor-pointer font-semibold transition duration-300"> {{ $item->category->name }} </p>
                    <a href="#" class="bg-primary-green py-1 px-3 w-full  text-white  border-2 border-white outline outline-4 outline-primary-green hover:bg-dark-green hover:outline-dark-green transition-all duration-300 cursor-pointer  "> Add To Cart </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="my-16 mx-auto flex justify-center items-center max-w-[992px] gap-6">
        <button wire:click="previousPage('{{ $pageName }}')" class="bg-primary-green hover:bg-dark-green text-white px-4 py-2 rounded-lg shadow transition duration-300 cursor-pointer  disabled:bg-dark-green disabled:opacity-75 disabled:cursor-default" @if ($items->onFirstPage()) disabled @endif>
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
        <button wire:click="nextPage('{{ $pageName }}')" class="bg-primary-green hover:bg-dark-green text-white px-4 py-2 rounded-lg shadow transition duration-300 cursor-pointer disabled:bg-dark-green disabled:opacity-75 disabled:cursor-default" @if (!$items->hasMorePages()) disabled @endif>
            Next >>
        </button>
    </div>

</div>
