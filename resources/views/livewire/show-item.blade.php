<div class="flex items-center justify-center my-4">
    <x-slot:title> Item - {{ $item->name }} </x-slot:title>
    <div
        wire:navigate
        class="flex flex-col bg-white rounded-md w-1/3 max-w-xs gap-3 border border-gray-300 shadow-lg pb-4">
        <div class="overflow-hidden">
            <img
                src="{{ $item->img_url  }}"
                alt="Product Image"
                class="w-full h-full object-cover hover:scale-110 transition-transform duration-300 cursor-pointer"
                onerror="this.onerror=null;this.src='https://picsum.photos/300/300?random={{ $item->id }}';"
            />
        </div>
        <div class="flex justify-center gap-3 flex-col px-3">
            <h2 class="text-lg text-black font-semibold"> {{ $item->name }} </h2>
            <p class="text-gray-400 hover:text-primary-green">  $ {{ $item->price }} </p>
            <p class="text-gray-600 hover:text-primary-green cursor-pointer font-semibold transition duration-300"> {{ $item->category->name }} </p>
            @guest
                <a href="/login" wire:navigate class="bg-primary-green py-3 px-6 w-full text-white border-2 border-white outline outline-4 outline-primary-green hover:bg-dark-green hover:outline-dark-green transition-all duration-300 cursor-pointer rounded-lg shadow-lg relative flex items-center justify-center"> Add To Cart </a>
            @endguest
            @auth
                <livewire:add-to-cart  class="bg-primary-green py-1 px-3 w-full  text-white  border-2 border-white outline outline-4 outline-primary-green hover:bg-dark-green hover:outline-dark-green transition-all duration-300 cursor-pointer" :user="Auth::user()"  :item="$item"/>
            @endauth
        </div>
    </div>
</div>
