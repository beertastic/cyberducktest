<?php

namespace App\Livewire;


use App\Models\Product;
use App\Models\Supplier;
use Livewire\Component;

class AddCoffeeForm extends Component
{

    public $product_id;
    public string $supplier_id = '';
    public string $name = '';
    public string $currency = '';
    public string $price = '';
    public string $profit = '';
    public string $shipping = '';

    public function render()
    {
        return view('livewire.add-coffee-form', [
            'suppliers' => Supplier::all(),
            'products' => Product::all()
        ]);
    }

    public function saveProduct(): void
    {
        $validated = $this->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'name' => 'required|string|min:3|max:255',
            'currency' => 'required|string|min:3|max:3',
            'price' => 'required|numeric|min:1',
            'profit' => 'required|numeric|min:1',
            'shipping' => 'required|numeric|min:0',
        ]);

        Product::updateOrCreate(['id' => $this->product_id], $validated);
        $this->reset();
    }

    public function loadProduct($id)
    {
        $product = Product::find($id);
        $this->product_id = $product->id;
        $this->supplier_id = $product->supplier_id;
        $this->name = $product->name;
        $this->currency = $product->currency;
        $this->price = $product->price;
        $this->profit = $product->profit;
        $this->shipping = $product->shipping;
    }

}
