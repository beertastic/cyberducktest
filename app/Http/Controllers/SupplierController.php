<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\View\View;

class SupplierController extends Controller
{
    public function index(): View
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('shipping_partners', [
            'suppliers' => $suppliers,
            'products' => $products
        ]);

    }
}
