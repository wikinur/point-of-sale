<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_order_line extends Model
{
    use HasFactory;
    protected $table = 'purchase_order_line';
    protected $primaryKey = 'id_po_line';
    // protected $fillable = ['purchase_order_id', 'product_id', 'qty', 'buy', 'grand_total'];
    public $timestamps = false;

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
