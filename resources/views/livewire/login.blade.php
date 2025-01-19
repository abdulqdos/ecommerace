<div class="bg-black py-10">
    <x-layouts.page-header :white="true">🔑 Welcome Back! Login to Continue 🚀</x-layouts.page-header>
    <form class="max-w-2xl mx-auto space-y-6"  wire:submit="authenticate" method="GET">
        @csrf

        <x-forms.input label="Your Email" name="email" wire:model="email" type="email" placeholder="John@Doe.com"/>
        <x-forms.error name="email" />

        <x-forms.input label="Password"  name="password" wire:model="password" type="password"  placeholder="XXXXXXXX"/>
        <x-forms.error name="password" />

        <div class="flex justify-between items-center">
            <x-forms.button> Login </x-forms.button>
            <a href="/" class="text-white bg-white/10 rounded-xl py-2 px-6 font-bold hover:bg-white/25 transition duration-300 cursor-pointer"> Back </a>
        </div>
    </form>
</div>
