<div class="container mx-auto py-10 flex flex-col items-center justify-center">
    <!-- Header Section -->
    <x-cards.card-header > أقسامنا </x-cards.card-header>

    <!-- Category Cards -->
    <div class="flex flex-wrap justify-center gap-6 max-w-[992px] items-center my-4">
        <!-- Category Card -->
        @foreach($categories as $category)
            <div class="w-72 bg-white rounded-lg shadow-lg overflow-hidden  hover:shadow-xl">
                <div class="overflow-hidden">
                    <img
                        src="{{ $category->img_url  }}"
                        alt="Product Image"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-300 cursor-pointer"
                        onerror="this.onerror=null;this.src='https://picsum.photos/300/300?random={{ $category->id }}';"
                    />
                </div>
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800"> {{ $category->name }}</h2>
{{--                    <p class="text-gray-500">Find a wide selection of clothing for all seasons.</p>--}}
                    <a href="#" class="block bg-primary-green text-white py-2 px-4 mt-4 text-center rounded hover:bg-dark-green transition">Shop Now</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
