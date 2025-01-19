<div class="bg-black py-10">
    <x-layouts.page-header :white="true">✨ Join Us and Start Your Journey Today! 🌟</x-layouts.page-header>

    <form class="max-w-2xl mx-auto space-y-6"  wire:submit="authenticate" method="GET">
        @csrf
        <x-forms.input label="Name:" name="name" wire:model="name" type="text" placeholder="John Doe"/>
        <x-forms.error name="name" />


        <x-forms.input label="Your Email" name="email" wire:model="email" type="email" placeholder="John@Doe.com"/>
        <x-forms.error name="email" />

        <x-forms.input label="Password"  name="password" wire:model="password" type="password"  placeholder="XXXXXXXX"/>

        <x-forms.input label="Confirm Password" name="password_confirmation" wire:model="password_confirmation" type="password" placeholder="Confirm your password" />
        <x-forms.error name="password" />

        <div class="flex justify-between items-center">
            <x-forms.button> Signup </x-forms.button>
            <a href="/" class="text-white bg-white/10 rounded-xl py-2 px-6 font-bold hover:bg-white/25 transition duration-300 cursor-pointer"> Back </a>
        </div>
    </form>
</div>
