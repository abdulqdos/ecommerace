
<div>
    <x-layouts.page-header> Cart </x-layouts.page-header>
    @if(count($items) > 0)
        <div class="flex flex-row items-center justify-between px-10">
            <div class="flex flex-col ">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 ">Product</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 ">Name</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 ">Quantity</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 ">Price</th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-700 "></th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200">
                                    @foreach($items as $item)
    {{--                            @dd($item->id)--}}
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                <img
                                                    src="{{ $item->img_url  }}"
                                                    alt="Product Image"
                                                    class="w-10"
                                                    onerror="this.onerror=null;this.src='https://picsum.photos/300/300?random={{ $item->id }}';"
                                                />
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                {{ $item->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                {{ $item->pivot->quantity }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                {{ $item->price }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                               <a
                                                wire:navigate
                                                wire:click="deleteItem({{ $item->pivot->id }})"
                                               >
                                                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 text-gray-800 hover:text-red-600 transition duration-300 cursor-pointer">
                                                       <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                   </svg>

                                               </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                إتمام الشراء
            </div>
        </div>
    @else
        Empty
    @endif
</div>
