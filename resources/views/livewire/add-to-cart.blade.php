<div class="w-full"  >

    @if($flag)
        <a href="/cart/{{$user->id}}" class="bg-primary-green py-1 px-3 w-full  text-white  border-2 border-white outline outline-4 outline-primary-green hover:bg-dark-green hover:outline-dark-green transition-all duration-300 cursor-pointer">Show Cart</a>
    @else
        <button wire:click="addToCart" class="bg-primary-green py-1 px-3 w-full  text-white  border-2 border-white outline outline-4 outline-primary-green hover:bg-dark-green hover:outline-dark-green transition-all duration-300 cursor-pointer">Add To Cart </button>
    @endif
</div>
