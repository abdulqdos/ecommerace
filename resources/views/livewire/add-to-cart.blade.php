<div class="w-full">
    @if($addedToCart)
        <a href="/cart/{{$user->id}}" class="bg-primary-green py-3 px-6 w-full text-white border-2 border-white outline outline-4 outline-primary-green hover:bg-dark-green hover:outline-dark-green transition-all duration-300 cursor-pointer rounded-lg shadow-lg flex items-center justify-center">
            Show Cart
        </a>
    @else
        <button
            wire:click="addToCart"
            wire:loading.attr="disabled"
            class="bg-primary-green py-3 px-6 w-full text-white border-2 border-white outline outline-4 outline-primary-green hover:bg-dark-green hover:outline-dark-green transition-all duration-300 cursor-pointer rounded-lg shadow-lg relative flex items-center justify-center"
            wire:loading.class="py-4"
        >
            <span wire:loading.remove class="text-lg font-semibold">Add To Cart </span>

            <span wire:loading class="absolute  flex items-center justify-center">
                <div class="w-6 h-6 border-2 border-white border-t-2 border-t-transparent rounded-full animate-spin"></div>
            </span>
        </button>
    @endif
</div>
