<?php

namespace App\Livewire;

use Akaunting\Money\Currency;
use Akaunting\Money\Money;
use App\Models\Product;
use App\Models\Sales;
use Livewire\Component;

class RecordCoffeeSale extends Component
{

    public Product $product;
    public  $product_id = 0;
    public  $quantity = 0;

    public  $unit_cost = 0;

    public  $shipping = 0;
    public  $profit = 0;
    public  $selling_price = 0;
    public  $price = 0;
    public string $currency = 'GBP';

    public function render()
    {
        $products = Product::all();
        // TODO: if there's only one product, set it up. I think there's cleaner ways todo this.
        if ($products->count() == 1) {
            $this->product_id = $products->first()->id;
            if ($this->quantity == 0) {
                $this->unit_cost = number_format($products->first()->price / 100, 2);
            }

        }

        return view('livewire.record-coffee-sale', [
            'products' => $products,
            'sales'  => Sales::all(),
        ]);
    }

    public function changeProduct()
    {
        $this->unit_cost = 0;
        $this->selling_price = 0;
        $this->quantity = 0;
        if ($this->product_id > 0) {
            // TODO: added to prevent user selecting 'please select a coffee' and getting error
            $product = Product::find($this->product_id);
            // TODO: I dont like looking this up again, MUST be a cleaner way to pass this data.
            $this->unit_cost = number_format($product->price/100, 2);
        }
    }

    public function updateSellingPrice()
    {
        $this->selling_price = 0;
        if ($this->product_id > 0) {
            $product = Product::find($this->product_id);
            // Selling Price = (Cost / ( 1 - {Profit-margin} ) ) + {Shipping-cost}
            $price = (($this->unit_cost * 100) / (1 - ($product->profit / 100)) + $product->shipping );
            // TODO: not used to the MONEY ext. seems great but I need to lean how to handle the decimals properly. for now, and PoC, I'm quick fixing.. needs clean up!!
            $this->selling_price = number_format((($price / 100) * $this->quantity), 2); // in 'pennies'
        }
    }

    public function addSale()
    {
        $validated = $this->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
            'unit_cost' => 'required|numeric|min:1',
            'price' => 'required|numeric',
        ]);

        $product = Product::find($this->product_id);

        Sales::create([
            'product_id' => $product->id,
            'quantity' => $this->quantity,
            'unit_cost' => $this->unit_cost * 100,
            'selling_price' => $product->price,
            'shipping' => $product->shipping,
            'profit' => $product->profit,
            'price' => $this->selling_price * 100,
            'currency' => $product->currency
        ]);
        $this->reset();
    }
}
