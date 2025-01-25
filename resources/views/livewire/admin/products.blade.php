<div>
    <header class="flex flex-row items-center justify-between mx-4">
        <h2 class="font-semibold"> Products ({{ $products->count() }}) </h2>
        <a href="#" class="bg-primary-green hover:bg-dark-green transition duration-300 text-white py-1 px-3 rounded-md"> + Add Product </a>
    </header>

    <div class="bg-white mx-auto py-1 px-3 mt-4">
        <header class="p-4 flex items-center justify-between border-b border-gray-300">
                <input type="text" placeholder="Search Products" class="flex bg-neutral-100 rounded-md px-3 py-2 mr-4 placeholder:text-neutral-400">
               <div>
                   <select class="border border-gray-300 rounded-md px-3 py-2 mr-2">
                       <option value="import">Import</option>
                       <option value="export"> Select </option>
                   </select>
                   <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                       فلتر
                   </button>
               </div>
        </header>

        @foreach($products as $product)
            <p class="text-blue-800"> {{ $product->name }}</p>
            <br>
        @endforeach
    </div>
</div>
