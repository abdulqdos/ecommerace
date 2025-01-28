<div class="bg-white rounded-md shadow-sm flex flex-col">

    <header class="flex flex-row items-center justify-between py-3 px-3 mb-3 border-b border-gray-200">
        <h2 class="font-semibold"> Order # {{ $order->id }}</h2>
        <div>
            @if($order->status == 'pending')
                <span class="py-1 px-3 rounded-md border border-blue-600 text-blue-600"> {{ $order->status }} </span>
            @elseif($order->status == 'delivered')
                <span class="py-1 px-3 rounded-md border border-green-600 text-green-600"> {{ $order->status }} </span>
            @else
                <span class="py-1 px-3 rounded-md border border-red-600 text-red-600"> {{ $order->status }} </span>
            @endif
        </div>
    </header>

{{--    @dd($order->items)--}}
    <div>
        <table class="min-w-full bg-white border-t-none border-b  border-gray-300 rounded-md">
            <thead class="border-b border-gray-300">
            <tr>
                <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">#</th>
                <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-start">Product</th>
                <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">Description</th>
                <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">Price</th>
                <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">Stock</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach($order->items as $i => $product)
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

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
