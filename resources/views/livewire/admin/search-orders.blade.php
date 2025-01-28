<div>
    <div class="flex flex-col gap-4 border rounded-md bg-white shadow-lg border-gray-300 p-4 max-w-full md:max-w-4xl mx-auto">
        <!-- Header Section -->
        <header class="p-4 flex flex-col md:flex-row items-center justify-between border-b border-gray-300 gap-4">

            <!-- Search Input -->
            <div class="relative flex items-center w-full md:w-auto">
                <input
                    type="text"
                    placeholder="Search Orders"
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
                                            wire:click="setStatus()"
                                            class="px-4 py-2 text-sm font-medium rounded-md cursor-pointer transition-all duration-300 text-gray-800 hover:text-primary-green {{ $status == ' ' ? 'text-primary-green' : '' }}">
                                            All
                                        </button>

                                        <span class="bg-dark-green {{ $status == ' ' ? 'w-full h-1' : '' }}"> </span>
                                    </div>

                                    <div class="flex flex-col gap-3">

                                        <button
                                            wire:click="setStatus('pending')"
                                            class="px-4 py-2 text-sm font-medium rounded-md cursor-pointer transition-all duration-300 text-gray-800 hover:text-primary-green {{ $status == 'pending' ? 'text-primary-green' : '' }}">
                                            Pending
                                        </button>

                                        <span class="bg-dark-green {{ $status == 'pending' ? 'w-full h-1' : '' }}"> </span>
                                    </div>

                                    <div class="flex flex-col gap-3">

                                        <button
                                            wire:click="setStatus('shipped')"
                                            class="px-4 py-2 text-sm font-medium rounded-md cursor-pointer transition-all duration-300 text-gray-800 hover:text-primary-green {{ $status == 'shipped' ? 'text-primary-green' : '' }}">
                                            shipped
                                        </button>

                                        <span class="bg-dark-green {{ $status == 'shipped'  ? 'w-full h-1' : '' }}"> </span>
                                    </div>

                                    <div class="flex flex-col gap-3">

                                        <button
                                              wire:click="setStatus('delivered')"
                                            class="px-4 py-2 text-sm font-medium rounded-md cursor-pointer transition-all duration-300 text-gray-800 hover:text-primary-green {{ $status == 'delivered' ? 'text-primary-green' : '' }}">
                                            Delivered
                                        </button>

                                        <span class="bg-dark-green {{ $status == 'delivered' ? 'w-full h-1' : '' }}"> </span>
                                    </div>
                                </div>
                            </div>
        </header>

        <!-- Table Section -->
        <div class="overflow-x-auto">
            @if($orders->count() > 0)
                <table class="min-w-full bg-white border-t-none border-b  border-gray-300 rounded-md">
                    <thead class="border-b border-gray-300">
                    <tr>
                        <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">#</th>
                        <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">Customer </th>
                        <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">Products Number</th>
                        <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center"> Total Price </th>
                        <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center"> Order Status</th>

                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($orders as $i => $order)

                        <tr>
                            <td class="p-3 text-sm text-gray-800 text-center">{{ $i + 1 }}</td>
                            <td class="p-3 text-sm text-gray-800">
                                <div class="flex items-center justify-center gap-4">
                                    <a href="customers/{{ $order->customer->id }}" class="transition duration-300 hover:underline hover:text-primary-green">
                                        {{ $order->customer->first_name . ' ' .  $order->customer->last_name }}
                                    </a>
                                </div>
                            </td>
                            <td class="p-3 text-sm text-gray-800 text-center truncate max-w-[150px] ">
                                {{ $order->items->count() }}
                            </td>
                            <td class="p-3 text-sm text-gray-800 text-center">
                                {{ $order->total }} $
                            </td>
                            <td class="p-3 text-sm text-gray-800 text-center">
                                @if($order->status == 'pending')
                                    <span class="py-1 px-3 rounded-md border border-blue-600 text-blue-600"> {{ $order->status }} </span>
                                @elseif($order->status == 'delivered')
                                    <span class="py-1 px-3 rounded-md border border-green-600 text-green-600"> {{ $order->status }} </span>
                                @else
                                    <span class="py-1 px-3 rounded-md border border-red-600 text-red-600"> {{ $order->status }} </span>
                                @endif
                            </td>
                            <td class="p-3 text-sm text-gray-800 text-center">
                                <div class="flex justify-center gap-4">
                                    <a href="orders/{{ $order->id }}" class="text-yellow-400 hover:text-yellow-500" wire:navigate> Show </a>
                                    <button class="text-red-600 hover:text-red-800" wire:click="delete({{ $order }})" wire:navigate>Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="w-full my-10 mx-auto text-center">
                    <p class="text-secondary"> No Orders Found , Please Try Again </p>
                </div>
            @endif
        </div>
    </div>
</div>
