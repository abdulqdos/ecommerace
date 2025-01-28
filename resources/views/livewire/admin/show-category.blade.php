<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <div class="flex flex-col md:flex-row items-center justify-between gap-6 p-6">
        <!-- Image Section -->
        <div class="flex-shrink-0">
            <img
                src="{{ \Illuminate\Support\Facades\Storage::url($category->img_url) }}"
                alt="Category Image"
                class="w-full h-[300px] object-cover rounded-md"
            />
        </div>

        <!-- Text Section -->
        <div class="flex flex-col  text-left md:text-left mt-6 md:mt-0 gap-y-10">
            <h2 class="text-2xl font-semibold text-primary-green  mb-2">{{ $category->name }}</h2>
            <p class="text-gray-600 text-sm md:text-base">{{ $category->description }}</p>
            <a href="/admin/categories" class="md:text-base text-primary-green hover:text-dark-green hover:underline py-2 rounded-lg transition duration-300 ">
                Back To Categories Page
            </a>
        </div>
    </div>
</div>
