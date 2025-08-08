<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'notransaksi',
        'product_id',
        'qty',
        'total_harga',
    ];
    
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}