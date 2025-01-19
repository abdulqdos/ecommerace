@props(['white' => false])

@if($white)
    <h1 class = "font-bold text-center text-4xl mb-8 text-white"> {{ $slot }}</h1>
@else
    <h1 class = "font-bold text-center text-4xl mb-8"> {{ $slot }}</h1>
@endif
