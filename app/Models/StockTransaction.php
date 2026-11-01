<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    protected $fillable = [
        'product_id',
        'type',
        'amount',
        'stock_before',
        'stock_after',
        'transaction_date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}