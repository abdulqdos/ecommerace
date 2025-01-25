<div >
    <x-cards.card-header > {{ $header }}</x-cards.card-header>
    <div class="flex flex-wrap justify-center items-center gap-5 max-w-[1200px]">
        @foreach($items as $item)
            <x-cards.card :item="$item" />
        @endforeach
    </div>

</div>
