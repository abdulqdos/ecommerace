<div class="flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-96">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Edit Category</h2>
        <p class="text-sm text-gray-500 mb-6">Edit category for your system.</p>



        <!-- Form -->
        <form class="space-y-4" wire:submit="edit">
            <!-- Avatar Upload -->
            <div class="mb-6">
                <label for="file" class="block text-gray-600 mb-2">
                    Image Category
                </label>
                <div class="flex flex-col gap-4 items-center">
                    @if($img)
                        <img class="w-1/2 inline rounded-full" src= " {{ $img->temporaryUrl() }}" />
                    @elseif($img_url)
                        <img class="w-1/2 inline rounded-full" src= " {{ \Illuminate\Support\Facades\Storage::url($img_url) }}" />
                    @endif
                </div>
                <input
                    type="file"
                    id="file"
                    wire:model="img"
                    class="w-full px-4 py-2 cursor-pointer bg-transparent border border-transparent rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('form.photo') border-red-500 ring-2 ring-red-500 focus:ring-2 focus:ring-red-500 @enderror"
                />
            </div>

            @error('img')
            <span class="text-red-500 font-bold italic">{{ $message }}</span>
            @enderror
            <div>
                <label for="name" class="block text-sm text-gray-600">Name category</label>
                <input
                    type="text"
                    id="name"
                    placeholder="Name"
                    wire:model="name"
                    class="w-full border border-gray-300 rounded-md p-2 mt-1 outline-none focus:border-1 focus:border-primary-green">
            </div>

            @error('name')
            <x-layouts.error :message="$message"/>
            @enderror

            <div>
                <label for="description" class="block text-sm text-gray-600">Description</label>
                <textarea
                    id="description"
                    placeholder="Enter description here..."
                    wire:model="description"
                    class="w-full border border-gray-300 rounded-md p-2 mt-1 resize-none outline-none focus:border-1 focus:border-primary-green"
                    rows="4">
                </textarea>
            </div>

            @error('description')
            <x-layouts.error :message="$message"/>
            @enderror

            <!-- Buttons -->
            <div class="flex justify-between items-center mt-4">
                <a href="/admin/categories"  wire:navigate class="text-white bg-gray-800 rounded-xl py-2 px-6 font-semibold hover:bg-gray-700 transition duration-300 cursor-pointer">Back</a>
                <button class="flex items-center justify-center text-white bg-dark-green rounded-xl py-2 w-40 text-center min-h-12 font-semibold hover:bg-primary-green transition duration-300 cursor-pointer relative">
                    <span wire:loading.remove>Edit Category</span>
                    <span wire:loading class="absolute flex items-center justify-center">
                        <div class="w-6 h-6 border-2 border-white border-t-2 border-t-transparent rounded-full animate-spin"></div>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
