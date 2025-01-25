<div class="bg-black py-10">
    <x-layouts.page-header :white="true">🔑 Welcome Back! Login to Continue 🚀</x-layouts.page-header>
    <form class="max-w-2xl mx-auto space-y-6"  wire:submit="authenticate" method="GET">
        @csrf

        <x-forms.input label="Your Email" name="email" wire:model="email" type="email" placeholder="John@Doe.com"/>
        <x-forms.error name="email" />

        <x-forms.input label="Password"  name="password" wire:model="password" type="password"  placeholder="XXXXXXXX"/>
        <x-forms.error name="password" />

        <div class="flex items-center">
            <input id="remember_me" type="checkbox" wire:model="remember_me" class="h-4 w-4 text-primary-green border-gray-300 rounded focus:ring-primary-green" />
            <label for="remember_me" class="ml-2 text-white text-sm">Remember me</label>
        </div>


        <div class="flex justify-between items-center">
            <button class="flex items-center text-white bg-dark-green rounded-xl py-2 px-6 w-24 min-h-12 font-bold hover:bg-primary-green transition duration-300 cursor-pointer relative">
                <span wire:loading.remove> Login </span>
                <span wire:loading class="absolute  flex items-center justify-center">
                     <div class="w-6 h-6 border-2 border-white border-t-2 border-t-transparent rounded-full animate-spin"></div>
                </span>
            </button>
            <a href="/" class="text-white bg-white/10 rounded-xl py-2 px-6 font-bold hover:bg-white/25 transition duration-300 cursor-pointer"> Back </a>
        </div>

    </form>
</div>
