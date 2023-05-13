<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $primaryKey = 'id_sale';
    protected $fillable = ['no_struk', 'grand_total', 'kembalian', 'total_cost'];

    // Relasi one to many
    public function salelines()
    {
        return $this->hasMany(Sale_line::class, 'sale_id', 'id_sale');
    }

    public function total_jumlah_bayar($awal, $akhir)
    {
        return $this->whereDate('created_at', '>=', $awal)
            ->whereDate('created_at', '<=', $akhir)->sum('total_cost');
    }

    public function total_kembalian($awal, $akhir)
    {
        return $this->whereDate('created_at', '>=', $awal)
            ->whereDate('created_at', '<=', $akhir)->sum('kembalian');
    }

    public function total_grand_total($awal, $akhir)
    {
        return $this->whereDate('created_at', '>=', $awal)
            ->whereDate('created_at', '<=', $akhir)->sum('grand_total');
    }
}
