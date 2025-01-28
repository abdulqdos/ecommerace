<div class="bg-white rounded-md">
    <div class="flex flex-col md:flex-row items-center gap-10 p-6">
        <!-- Image Section -->
        <div class="flex-shrink-0 w-full md:w-1/2">
            <img
                src="{{ \Illuminate\Support\Facades\Storage::url($product->img_url) }}"
                alt="Product Image"
                class="w-72 h-72 object-cover rounded-lg"
            />
        </div>

        <!-- Text Section -->
        <div class="flex flex-col text-left md:text-left gap-y-6 w-full md:w-1/2">
            <!-- Product Title -->
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-semibold text-primary-green">{{ $product->name }}</h2>
                <!-- Featured Badge -->
                @if($product->featured)
                    <span class="bg-blue-200 text-blue-800 text-sm font-bold px-3 py-1 rounded-md">
                        Featured
                    </span>
                @endif
            </div>

            <!-- Product Description -->
            <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                {{ $product->description }}
            </p>

            <!-- Price Section -->
            <p class="text-lg font-semibold text-gray-800">
                ${{ number_format($product->price, 2) }}
            </p>

            <!-- Stock Status -->
            @if($product->stock > 0)
                <p class="text-sm text-green-600 font-medium">In Stock: {{ $product->stock }}</p>
            @else
                <p class="text-sm text-red-600 font-medium">Out of Stock</p>
            @endif

            <!-- Back Button -->
            <a href="/admin/products" class="text-primary-green hover:text-dark-green hover:underline font-medium py-2 rounded-lg transition duration-300">
                Back to Products Page
            </a>
        </div>
    </div>
</div>
