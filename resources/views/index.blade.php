<x-layouts.app>
    <x-slot:title> Style Fusion </x-slot:title>

    <div class="landing bg-black min-h-screen flex items-center justify-center text-white relative overflow-hidden">

        <div class="text-center z-10">
            <h1 class="text-5xl font-extrabold leading-tight mb-4 overflow-hidden whitespace-nowrap border-r-4 border-primary-green animate-typing-loop font-skill">
                Welcome to Style Fusion's World
            </h1>

            <p class="text-lg mb-8">Discover the amazing projects and stories that make this space truly unique.</p>
            <a href="/categories" class="px-6 py-3 text-lg bg-primary-green text-white rounded-md transition duration-500 hover:bg-dark-green" wire:navigate>
                Explore Collections
            </a>
        </div>
    </div>

    <div class="my-4 bg-white flex flex-col items-center justify-center">
        <livewire:item header="عروضنا المميزة" />
    </div>

    <div class="my-4 bg-white flex flex-col items-center justify-center">
        <livewire:item header="الأكثر مبيعا" />
    </div>

</x-layouts.app>
