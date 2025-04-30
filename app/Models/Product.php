<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'supplier_id',
        'name',
        'currency',
        'price',
        'profit',
        'shipping'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
