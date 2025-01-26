<div class="flex flex-col gap-4 border rounded-md bg-white shadow-lg border-gray-300 p-4 max-w-full md:max-w-4xl mx-auto">
    <!-- Header Section -->
    <header class="p-4 flex flex-col md:flex-row items-center justify-between border-b border-gray-300 gap-4">

        <!-- Search Input -->
        <div class="relative flex items-center w-full md:w-auto">
            <input
                type="text"
                placeholder="Search Products"
                wire:model.live="searchText"
                class="bg-neutral-100 rounded-md px-3 py-2 pl-10 w-full placeholder:text-neutral-400 outline-none focus:outline-1 focus:outline-primary-green"
            >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="absolute left-3 w-5 h-5 text-neutral-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-4.35-4.35M15 11a4 4 0 11-8 0 4 4 0 018 0z"
                />
            </svg>
        </div>

        <!-- Filter Section -->
        <div class="mb-3">
            <div class="flex gap-6">
                <!-- Featured Button -->
                <div class="flex flex-col gap-3">

                    <button
                        wire:click="setFeatured(true)"
                        class="px-4 py-2 text-sm font-medium rounded-md cursor-pointer transition-all duration-300 text-gray-800 hover:text-primary-green {{ $featured ? 'text-primary-green' : '' }}">
                        Featured
                    </button>

                    <span class="bg-dark-green {{ $featured ? 'w-full h-1' : '' }}"> </span>
                </div>

                <div class="flex flex-col gap-3">

                    <button
                        wire:click="setFeatured(false)"
                        class="px-4 py-2 text-sm font-medium rounded-md cursor-pointer transition-all duration-300 text-gray-800 hover:text-primary-green {{ !$featured ? 'text-primary-green' : '' }}">
                        All
                    </button>

                    <span class="bg-dark-green {{ !$featured ? 'w-full h-1' : '' }}"> </span>
                </div>

            </div>
        </div>
    </header>

    <!-- Table Section -->
    <div class="overflow-x-auto">
        @if($products->count() > 0)
        <table class="min-w-full bg-white border-t-none border-b  border-gray-300 rounded-md">
            <thead class="border-b border-gray-300">
                <tr>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">#</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-start">Product</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">Description</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">Price</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">Stock</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach($products as $i => $product)
                <tr>
                    <td class="p-3 text-sm text-gray-800 text-center">{{ $i + 1 }}</td>
                    <td class="p-3 text-sm text-gray-800">
                        <div class="flex items-center gap-4">
                            <img
                                src="{{ \Illuminate\Support\Facades\Storage::url($product->img_url) }}"
                                alt="Product Image"
                                class="w-10 h-10 rounded-md"
                                onerror="this.onerror=null;this.src='https://picsum.photos/300/300?random={{ $product->id }}';"
                            />
                            <a href="#" class="transition duration-300 hover:underline hover:text-primary-green">
                                {{ $product->name }}
                            </a>
                        </div>
                    </td>
                    <td class="p-3 text-sm text-gray-800 text-center truncate max-w-[150px]">
                        {{ $product->description }}
                    </td>
                    <td class="p-3 text-sm text-gray-800 text-center">
                        {{ $product->price }} $
                    </td>
                    <td class="p-3 text-sm text-gray-800 text-center">
                        {{ $product->stock }}
                    </td>
                    <td class="p-3 text-sm text-gray-800 text-center">
                        <div class="flex justify-center gap-4">
                            <a href="products/{{ $product->id }}/edit" class="text-blue-600 hover:text-blue-800" wire:navigate> Edit</a>
                            <button class="text-red-600 hover:text-red-800" wire:click="delete({{ $product }})" wire:navigate>Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <div class="w-full my-10 mx-auto text-center">
                <p class="text-secondary"> No Products Found , Please Try Again </p>

            </div>
        @endif
    </div>
</div>
