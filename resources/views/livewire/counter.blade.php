<div>
    @if(Auth::user()->cart && Auth::user()->cart->items->isNotEmpty())
        <span class="absolute w-4 h-4 text-center bg-primary-green text-white rounded-full text-2xs top-[-7px] left-[15px]">
    {{ $cartItems->count() }}
</span>
    @endif
    <a
        href="/cart/{{ Auth::user()->cart->id }}"
        wire:navigate
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 text-white cursor-pointer hover:text-white/75 transition duration-300">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
        </svg>
    </a>
</div>

