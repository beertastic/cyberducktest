<div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if ($products->count() == 0)
                    Please create a new coffee product first
                @else
                    <div class="flex">
                        <div class="w-1/5 flex-1">Coffee</div>
                        <div class="w-1/5 flex-1">Quantity</div>
                        <div class="w-1/5 flex-1">Unit Cost (£)</div>
                        <div class="w-1/5 flex-1">Selling price</div>
                        <div class="w-1/5 flex-1"></div>
                    </div>
                    <form wire:submit="addSale">

                    <div class="flex">
                        <div class="w-1/5 flex-1">
                            @if($products->count() == 1)
                                {{ $products[0]->name }}
                                <input type="hidden" wire:model="product_id" wire:onload="changeProduct" value="{{ $products[0]->id }}">
                            @else
                                <select wire:model="product_id" wire:change="changeProduct">
                                    <option value="">Select a coffee</option>
                                    @foreach($products as $prod)
                                        <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="w-1/5 flex-1">
                            <input type="text" wire:model="quantity" wire:keydown="updateSellingPrice">
                        </div>
                        <div class="w-1/5 flex-1">
                            <input type="text" wire:model="unit_cost" value="{{ money($products[0]->price, $this->currency) }}">
                        </div>
                        <div class="w-1/5 flex-1" >
                            <input type="text" wire:model="selling_price" readonly>
                        </div>
                        <div class="w-1/5 flex-1">
                            <BUTTON>Record Sale</BUTTON>
                        </div>
                    </div>
                    </form>


                    Previous Sales:<hr />
                    <table class="border-separate border-spacing-2 border border-gray-400 dark:border-gray-500">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit Cost</th>
                            <th>Selling Price</th>
                            <th>Sold at</th>
                        </tr>
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale->product->name }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td>{{ $sale->unit_cost }}</td>
                                <td>@money($sale->price, $sale->currency)</td>
                                <td>{{ $sale->created_at }}%</td>
                            </tr>
                        @endforeach
                    </table>

            @endif
        </div>
    </div>
</div>
