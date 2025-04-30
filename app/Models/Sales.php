<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    use HasFactory, softDeletes;

    protected $table = "product_sales";

    protected $fillable = [
        'product_id',
        'quantity',
        'unit_cost',
        'shipping',
        'profit',
        'selling_price',
        'price',
        'currency'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
