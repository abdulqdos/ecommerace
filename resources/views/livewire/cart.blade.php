<div>
    <x-layouts.page-header> Cart </x-layouts.page-header>
    @if($items->count() > 0)
            <form wire:submit="save()">
                <div class="flex flex-col lg:flex-row items-center justify-between mx-auto px-4 lg:px-10 gap-6 my-10">
                        <div class="flex lg:flex-col mb-6 w-full lg:w-8/12">
                            <div class="-m-1.5 overflow-x-auto">
                                <div class="p-1.5 min-w-full inline-block align-middle">
                                    <div class="overflow-hidden">
                                            <table class="min-w-fit  divide-y divide-gray-200">
                                                <thead class="border-b border-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 ">Product</th>
                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 ">Name</th>
                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 ">Quantity</th>
                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 ">Price</th>
                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 ">Total</th> <!-- New column for Total -->
                                                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-700 "></th>
                                                </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200">
                                                @foreach($items as $item)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 text-center">
                                                            <img
                                                                src="{{ \Illuminate\Support\Facades\Storage::url($item->img_url) }}"
                                                                alt="Product Image"
                                                                class="w-10 mx-auto"
                                                            />
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center">
                                                            {{ $item->name }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center">
                                                            <div class="flex items-center justify-center space-x-2 px-3 py-1 border border-primary-green">
                                                                <button
                                                                    type="button"
                                                                    wire:click="decreaseQuantity({{ $item->pivot->id }})"
                                                                    @if($item->pivot->quantity == 1) disabled @endif
                                                                    class="w-8 h-8 text-secondary bg-transparent hover:bg-primary-green hover:text-white  flex items-center justify-center transition duration-300 disabled:opacity-75 disabled:hover:bg-transparent disabled:hover:text-secondary "
                                                                >
                                                                    -
                                                                </button>

                                                                <input
                                                                    type="number"
                                                                    class="w-12 py-1 px-2 text-center focus:ring-2 focus:ring-primary-green focus:outline-none no-arrows"
                                                                    value="{{ $item->pivot->quantity }}"
                                                                    wire:dirty.class="bg-primary-green"
                                                                />

                                                                <button
                                                                    type="button"
                                                                    wire:click="increaseQuantity({{ $item->pivot->id }})"
                                                                    class="w-8 h-8 text-gray-400 bg-transparent hover:bg-primary-green hover:text-white flex items-center justify-center transition duration-300"
                                                                >
                                                                    +
                                                                </button>
                                                            </div>
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center">
                                                            {{ $item->price }}
                                                        </td>

                                                        <!-- New Total Column -->
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center">
                                                            {{ $item->price * $item->pivot->quantity }} <!-- Calculated Total -->
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                            <a
                                                                wire:navigate
                                                                wire:click="deleteItem({{ $item->pivot->id }})"
                                                            >
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 text-gray-800 hover:text-red-600 transition duration-300 cursor-pointer">
                                                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Cart Price Section -->
                        <div class="border border-gray-300 p-4 bg-white min-w-96 flex flex-col gap-[20px] lg:w-4/12">
                            <h1 class="text-lg text-black font-semibold"> Total Cart Price </h1>
                            <div class="flex justify-between items-center">
                                <p class="text-secondary"> Total</p>
                                <p class="text-secondary"> {{ $user->cart->total }} $ </p>
                            </div>
                            <button class="bg-dark-green hover:bg-primary-green transition duration-500 cursor-pointer text-white px-3 py-1"> Complete Purchase </button>
                        </div>
                </div>
            </form>
    @else
        <div class="p-8 border border-gray-300 shadow-lg text-center bg-white mx-auto max-w-md m-10 rounded-lg">
            <svg class="mx-auto w-16 h-16 text-gray-400 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-1.4 10.5a4 4 0 01-4 3.5H8.4a4 4 0 01-4-3.5L3 3zM16 13v5a2 2 0 01-2 2H10a2 2 0 01-2-2v-5m4-3v6" />
            </svg>
            <p class="text-lg font-semibold text-gray-600">Your cart is empty</p>
            <p class="text-sm text-gray-500 mt-2">Start shopping and add items to your cart.</p>
            <a href="/products" class="mt-6 inline-block bg-dark-green hover:bg-primary-green text-white font-medium py-2 px-6 rounded-md shadow-md transition-all">
                Shop Now
            </a>
        </div>
    @endif
</div>
