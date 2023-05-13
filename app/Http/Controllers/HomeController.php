<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase_order;
use App\Models\Sale;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_pendapatan = Sale::whereDate('created_at', date('Y-m-d'))->sum('grand_total');
        $total_supplier = Supplier::count();
        $total_produk = Product::count();
        $total_pembelian = Purchase_order::count();

        $label_bar = ['sale'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60, 141, 138, 0.9)' : 'rgba(0, 0, 138, 0.9)';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                if ($key == 0) {
                    $data_month[] = Sale::select(DB::raw("SUM(grand_total) as total"))->whereMonth('created_at', $month)->first()->total;
                }
            }
            $data_bar[$key]['data'] = $data_month;
        }
        // return $data_bar;

        return view('index', compact('total_pendapatan', 'total_supplier', 'total_produk', 'total_pembelian', 'data_bar'));
    }
}
