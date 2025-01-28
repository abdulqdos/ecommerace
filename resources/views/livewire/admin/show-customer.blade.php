<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Customer Profile</h2>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <h3 class="text-lg font-semibold text-gray-600">First Name:</h3>
            <p class="text-gray-800">{{ $customer->first_name }}</p>
        </div>

        <div>
            <h3 class="text-lg font-semibold text-gray-600">Last Name:</h3>
            <p class="text-gray-800">{{ $customer->last_name }}</p>
        </div>

        <div>
            <h3 class="text-lg font-semibold text-gray-600">Phone Number:</h3>
            <p class="text-gray-800">{{ $customer->phone }}</p>
        </div>

        <div>
            <h3 class="text-lg font-semibold text-gray-600">Email:</h3>
            <p class="text-gray-800">{{ $customer->email }}</p>
        </div>

        <div>
            <h3 class="text-lg font-semibold text-gray-600">City:</h3>
            <p class="text-gray-800">{{ $customer->city }}</p>
        </div>

        <div>
            <h3 class="text-lg font-semibold text-gray-600">Address:</h3>
            <p class="text-gray-800">{{ $customer->address }}</p>
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="https://wa.me/{{ $customer->phone }}" target="_blank" class="inline-block bg-green-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-600">Contact via WhatsApp</a>
    </div>

</div>
