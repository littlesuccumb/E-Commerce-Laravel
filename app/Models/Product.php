<?php

namespace App\Models;
use App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
protected $fillable = ['nama','status','stok','harga' /* atribut yang dapat diisi secara massal lainnya */];


public function transaksis()
{
return $this->hasMany(Transaksi::class, 'product_id');
}
}