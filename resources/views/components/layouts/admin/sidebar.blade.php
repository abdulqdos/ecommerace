<!-- Sidebar -->
<div id="hs-sidebar-basic-usage" class="lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 w-fit lg:w-64 hs-overlay-open:translate-x-0 transition-all duration-300 transform h-full fixed top-0 start-0 bottom-0 z-[60] bg-white border-e border-gray-200" role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
        <!-- Header -->
        <header class="p-4 flex justify-between items-center gap-x-2">
            <!-- Logo -->
            <a class="flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80 transition-all duration-300" href="#" aria-label="Brand">
                <span class="hidden lg:block">Brand</span>
                <span class="block lg:hidden">B</span>
            </a>
        </header>
        <!-- End Header -->

        <!-- Body -->
        <nav class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
            <div class="pb-0 px-2 w-fit lg:w-full  flex flex-col flex-wrap">
                <ul class="space-y-1">

                    <x-layouts.admin.nav href="/admin" :active="request()->is('admin')" wire:navigate>
                        <svg class="w-4 text-primary-green" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        <span class="hidden lg:block"> Dashboard</span>
                    </x-layouts.admin.nav>


                    <x-layouts.admin.nav href="/admin/products" :active="request()->is('admin/products')" wire:navigate>
                        <svg class="w-4 text-primary-green" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zM9 10h6M9 14h6" />
                        </svg>
                        <span class="hidden lg:block">Products</span>
                    </x-layouts.admin.nav>



                        <x-layouts.admin.nav href="/admin/orders" :active="request()->is('admin/orders')" wire:navigate>
                            <svg class="w-4 text-primary-green" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18M8 7v10" />
                            </svg>
                            <span class="hidden lg:block">Orders</span>
                        </x-layouts.admin.nav>

                    <x-layouts.admin.nav href="/admin/customers" :active="request()->is('admin/customers')" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 text-primary-green">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        <span class="hidden lg:block">Customers</span>
                    </x-layouts.admin.nav>

                    <x-layouts.admin.nav href="/logout" :active="request()->is('logout')" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 text-primary-green">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>

                        <span class="hidden lg:block">Logout</span>
                    </x-layouts.admin.nav>
                </ul>
            </div>
        </nav>
        <!-- End Body -->
    </div>
</div>
<!-- End Sidebar -->
