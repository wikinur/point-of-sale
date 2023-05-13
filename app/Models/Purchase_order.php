<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_order extends Model
{
    use HasFactory;
    protected $table = 'purchase_orders';
    protected $primaryKey = 'id_purchase';
    protected $fillable = ['document_no', 'supplier_id', 'status_id'];

    // Reklasi Many to One
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id_supplier');
    }

    public function statuss()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function grand_total()
    {
        // $po = $this->id_po_line;
        $total = Purchase_order_line::where('purchase_order_id', 'id_po_line')->sum('grand_total');
        return $total;
    }

    // Relasi One to Many
    public function lines()
    {
        return $this->hasMany(Purchase_order_line::class, 'purchase_order_id', 'id_purchase');
    }
}
