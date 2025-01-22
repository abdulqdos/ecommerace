<div class="flex items-center  gap-6 my-10">
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


    <!-- Checkout Form Box (Right) -->
    <div class=" p-6 bg-white border border-gray-300 rounded-lg shadow-xl hover:shadow-2xl transition-all duration-300 w-1/2">
        <h3 class="text-xl font-semibold mb-4 text-blue-600">Checkout Form</h3>
        <form method="POST" action="#">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Full Name</label>
                <input type="text" id="name" name="name" required class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium">Shipping Address</label>
                <textarea id="address" name="address" required class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <div class="mb-4">
                <label for="payment" class="block text-sm font-medium">Payment Method</label>
                <select id="payment" name="payment" required class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="cash_on_delivery">Cash on Delivery</option>
                </select>
            </div>
            <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-200">
                Proceed to Payment
            </button>
        </form>
    </div>
</div>
