<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_line extends Model
{
    use HasFactory;
    protected $table = 'sale_line';
    protected $PrimaryKey = 'id_sale_line';
    // protected $fillable =[''];
    public $timestamps = false;

    // relasi many to one
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id_product');
    }
}
