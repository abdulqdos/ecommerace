<div class="bg-white">
    {{-- In work, do what you enjoy. --}}
    <header class="p-4 flex flex-col md:flex-row items-center justify-between border-b border-gray-300 gap-4">

        <!-- Search Input -->
        <div class="relative flex items-center w-full md:w-auto">
            <input
                type="text"
                placeholder="Search Customers"
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
                        wire:click="clear()"
                        class="px-4 py-2 text-sm font-medium rounded-md cursor-pointer transition-all duration-300 text-gray-800 hover:text-primary-green {{ $all == ' ' ? 'text-primary-green' : '' }}">
                        All
                    </button>

                    <span class="bg-dark-green {{ $all  ? 'w-full h-1' : '' }}"> </span>
                </div>

            </div>
        </div>
    </header>

    <div class="overflow-x-auto">
        @if($categories->count() > 0)
            <table class="min-w-full bg-white border-t-none border-b  border-gray-300 rounded-md">
                <thead class="border-b border-gray-300">
                <tr>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">#</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-start">Category</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">Description</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center"> Action</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($categories as $i => $category)
                    <tr>
                        <td class="p-3 text-sm text-gray-800 text-center">{{ $i + 1 }}</td>
                        <td class="p-3 text-sm text-gray-800">
                            <div class="flex items-center gap-4">
                                <img
                                    src="{{ \Illuminate\Support\Facades\Storage::url($category->img_url) }}"
                                    alt="Category Image"
                                    class="w-10 h-10 rounded-md"
                                />
                                <a href="categories/{{ $category->id }}" class="transition duration-300 hover:underline hover:text-primary-green">
                                    {{ $category->name }}
                                </a>
                            </div>
                        </td>

                        <td class="p-3 text-sm text-gray-800 text-center truncate max-w-[150px]">
                            {{ $category->description }}
                        </td>
                        <td class="p-3 text-sm text-gray-800 text-center">
                            <div class="flex justify-center gap-4">
                                <a href="categories/{{ $category->id }}/edit" class="text-blue-600 hover:text-blue-800" wire:navigate> Edit</a>
                                <button class="text-red-600 hover:text-red-800" wire:click="delete({{ $category }})" wire:navigate>Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="w-full my-10 mx-auto text-center">
                <p class="text-secondary"> No Categories Found , Please Try Again </p>
            </div>
        @endif
    </div>
</div>
