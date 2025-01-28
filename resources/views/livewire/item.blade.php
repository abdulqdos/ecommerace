
<div>
    <x-cards.card-header > {{ $header }}</x-cards.card-header>
{{--    @dd($flag)--}}
    @if($flag)
        <div class="flex flex-wrap justify-center items-center gap-5 max-w-[1200px]">
            @foreach($featuredItems as $item)
                <x-cards.card :item="$item" />
            @endforeach
        </div>
    @else
        <div class="flex flex-wrap justify-center items-center gap-5 max-w-[1200px]">
            @foreach($items as $item)
                <x-cards.card :item="$item" />
            @endforeach
        </div>
    @endif


</div>
