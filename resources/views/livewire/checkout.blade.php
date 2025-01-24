<div class="flex items-center  gap-6 my-10">
    @if($cart->items->count() > 0)
    <!-- Order Details Box (Left) -->
    <div class="flex flex-col items-start p-6 bg-white border border-gray-300 rounded-lg shadow-xl w-full max-w-3xl justify-between mx-20">
        <h3 class="text-2xl font-semibold mb-6 text-primary-green">Order Details</h3>
        <p class="text-gray-700 mb-4"><strong>Items in Cart:</strong></p>

        @foreach($cart->items as $item)
            <div class="flex items-center gap-6 border-b border-gray-200 py-4 hover:bg-gray-50 transition duration-300">
                <!-- Product Image -->
                <img
                    src="{{ $item->img_url }}"
                    alt="Product Image"
                    class="w-16 h-16 object-cover rounded-lg"
                    onerror="this.onerror=null;this.src='https://picsum.photos/300/300?random={{ $item->id }}';"
                />
                <!-- Product Details -->
                <div class="flex flex-col flex-1 gap-3">
                    <p class="text-gray-800 font-semibold text-lg">{{ $item->name }}</p>
                    <p class="text-secondary text-sm"> <span class="font-semibold text-secondary"> Price: </span> ${{ $item->price }}</p>
                    <p class="text-secondary text-sm"> <span class="font-semibold text-secondary"> Quantity: </span> {{ $item->pivot->quantity }}</p>
                    <p class="text-dark-green text-sm font-semibold">Total: ${{ $item->price * $item->pivot->quantity }}</p>
                </div>
            </div>
        @endforeach

        <div class="mt-6 border-t border-gray-200 pt-4">
            <p class="text-2xl font-semibold text-gray-800"><strong>Total:</strong> ${{ $cart->total }}</p>
        </div>
    </div>



    <!-- Card Section -->
    <div class="max-w-4xl p-3 sm:px-6 lg:px-8 mx-auto border border-gray-300 rounded-md"><!-- Card -->
        <div class="bg-white rounded-xl shadow p-4 sm:p-7 ">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-primary-green ">
                    Checkout
                </h2>

            </div>

            <form  wire:submit="save">
                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
                    <div class="sm:col-span-3">
                        <label for="first-name" class="inline-block text-sm text-gray-800 mt-2.5 cursor-pointer">
                            Full Name
                        </label>
                    </div>
                    <!-- End Col -->
                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <input id="first-name" type="text" class="py-2 px-3 pe-11 block w-full border border-gray-400 outline-none  shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-primary-green focus:ring-primary-green focus:outline-none disabled:opacity-50 disabled:pointer-events-none " placeholder="First Name" wire:model="form.firstName">
                            <input id="last-name" type="text" class="py-2 px-3 pe-11 block w-full border border-gray-400 outline-none  shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-primary-green focus:ring-primary-green focus:outline-none disabled:opacity-50 disabled:pointer-events-none" placeholder="Last Name" wire:model="form.lastName">
                        </div>
                        <div class="my-2 flex gap-6">
                            @error('form.firstName')
                            <span class="text-red-500 italic font-semibold">
                                {{ $message }}
                            </span>
                            @enderror
                            @error('form.lastName')
                            <span class="text-red-500 italic font-semibold">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- End Col -->


                    <div class="sm:col-span-3">
                        <label for="phone" class="inline-block text-sm text-gray-800 mt-2.5 cursor-pointer">
                            Phone
                        </label>
                    </div>
                    <!-- End Col -->
                    <div class="sm:col-span-9">
                        <input id="phone" type="text" class="py-2 px-3 block w-full border border-gray-400 outline-none shadow-sm text-sm relative rounded-lg focus:z-10 focus:border-primary-green focus:ring-primary-green focus:outline-none" placeholder="+x(xxx)xxx-xx-xx" wire:model="form.phone">
                        <div class="my-2">
                            @error('form.phone')
                            <span class="text-red-500 italic font-semibold">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="city" class="inline-block text-sm text-gray-800 mt-2.5 cursor-pointer">
                            City
                        </label>
                    </div>
                    <!-- End Col -->
                    <div class="sm:col-span-9">
                        <input id="city" type="text" class="py-2 px-3 block w-full border border-gray-400 outline-none  rounded-lg  shadow-sm text-sm relative focus:z-10 focus:border-primary-green focus:ring-primary-green focus:outline-none" placeholder="City" wire:model="form.city">
                        <div class="my-2">
                            @error('form.city')
                            <span class="text-red-500 italic font-semibold">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="address" class="inline-block text-sm text-gray-800 mt-2.5 cursor-pointer">
                            Address
                        </label>
                    </div>
                    <!-- End Col -->
                    <div class="sm:col-span-9">
                        <input id="address" type="text" class="py-2 px-3 block w-full border border-gray-400 outline-none  rounded-lg  shadow-sm text-sm relative focus:z-10 focus:border-primary-green focus:ring-primary-green focus:outline-none" placeholder="Address" wire:model="form.address">
                        <div class="my-2">
                            @error('form.address')
                            <span class="text-red-500 italic font-semibold">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="email" class="inline-block text-sm text-gray-800 mt-2.5 cursor-pointer">
                            Email
                        </label>
                        <span class="text-sm text-gray-800">(Optional)</span>
                    </div>
                    <!-- End Col -->
                    <div class="sm:col-span-9">
                        <input id="email" type="email" value="{{ Auth::user()->email }}"  class="py-2 px-3 block w-full border border-gray-400 outline-none  rounded-lg  shadow-sm text-sm relative focus:z-10 focus:border-primary-green focus:ring-primary-green focus:outline-none" placeholder="Email" wire:model="form.email">
                        <div class="my-2">
                            @error('form.email')
                            <span class="text-red-500 italic font-semibold">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- End Col -->

                </div>
                <!-- End Grid -->

                <div class="mt-5 min-w-full mx-auto gap-x-2 text-center">
                    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent  bg-primary-green text-white hover:bg-dark-green focus:outline-none transition duration-300 min-w-full">
                        Place Order
                    </button>
                </div>
            </form>

        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
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
