<div>

    <h2>Add New Coffee Product</h2>

        <form wire:submit.prevent="saveProduct" class="w-full max-w-sm">
            <input type="hidden" wire:model="product_id" value="">
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="supplier">
                            Supplier
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <select id="supplier" wire:model="supplier_id"  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                            <option value="">Select Supplier</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
               </div>

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                           for="name">
                        Product Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input wire:model="name" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="name"
                           type="text"
                           placeholder="Product name">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                           for="currency">
                        Currency
                    </label>
                </div>
                <div class="md:w-2/3">
                    <select wire:model="currency" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        <option>Select a currency</option>
                        <option value="GBP">GBP</option>
                        <option value="EUR">EUR</option>
                        <option value="USD">USD</option>
                    </select>
                    @error('currency')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

           <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                           for="price">
                        Price
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input wire:model="price" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="price"
                           type="number"
                           min="0"
                           step="1">
                    @error('price')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                           for="profit">
                        Profit
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input wire:model="profit" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="profit"
                           type="number"
                           min="0"
                           step="1">
                    @error('profit')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                           for="shipping">
                        Shipping
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input wire:model="shipping" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="shipping"
                           type="number"
                           min="0"
                           step="1">
                    @error('shipping')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button type="submit" class="shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded">Save Product</button>
                </div>
            </div>

        </form>

    Coffee list:<hr />
    <table width="100%">
        <tr>
            <th>Supplier</th>
            <th>Name</th>
            <th>Currency</th>
            <th>Price</th>
            <th>Profit</th>
            <th>Shipping</th>
            <th></th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->supplier->name }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->currency }}</td>
            <td>@money($product->price, $product->currency)</td>
            <td>{{ $product->profit }}%</td>
            <td>@money($product->shipping, $product->currency)</td>
            <td>
                <a wire:click="loadProduct({{ $product->id }})">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>

</div>
