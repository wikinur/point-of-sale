<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Sale_line;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SaleController extends Controller
{
    public function index()
    {
        return view('pos.sale.index');
    }

    public function get_product($code_product)
    {
        $prd = Product::where('code_product', $code_product)->first();

        return response()->json([
            'prd' => $prd,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $product_id = $request->product_id;
            $qty = $request->qty;
            $selling_price = $request->selling_price;
            $total_cost = $request->total_cost;
            $kembalian = $request->kembalian;

            $total_qty = array_sum($qty);
            $total_price = array_sum($selling_price);
            $total_buy = $total_qty * $total_price;

            $kembalian2 = $total_cost - $total_buy;

            if ($total_cost < $total_buy) {
                $kurang = $total_buy - $total_cost;
                Session::flash('status2', 'error');
                Session::flash('message', 'Maaf Uang Kurang Rp.' . number_format($kurang));
                return redirect()->back();
            }

            DB::transaction(function () use ($product_id, $qty, $selling_price, $total_cost, $kembalian) {
                $header = Sale::insertGetId([
                    'no_struk' => date('mdyHis'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                foreach ($product_id as $i => $pd) {
                    Sale_line::insert([
                        'sale_id' => $header,
                        'product_id' => $pd,
                        'selling_price' => $selling_price[$i],
                        'qty' => $qty[$i],
                        'grand_total' => (Int) $qty[$i] * (Int) $selling_price[$i],
                    ]);
                    $st = Product::find($pd);
                    $qty_now = $st->stock;
                    $qtynew = $qty_now - $qty[$i];
                    Product::where('id_product', $pd)->update([
                        'stock' => $qtynew,
                    ]);
                }

                $sum_total = Sale_line::where('sale_id', $header)->sum('grand_total');
                $kembalian = $total_cost - $sum_total;
                Sale::where('id_sale', $header)->update([
                    'total_cost' => $total_cost,
                    'kembalian' => $kembalian,
                    'grand_total' => $sum_total,
                ]);
            });
            Session::flash('status', 'success');
            Session::flash('message', 'Kembalian Rp. ' . number_format($kembalian2));
        } catch (Exception $e) {
            Session::flash('gagal', $e->getMessage());
        }
        return redirect()->back();
    }

    public function history()
    {
        $data = Sale::withCount('salelines')->orderBy('created_at', 'desc')->get();
        $awal = date('Y-m-d', strtotime('-1 days'));
        $akhir = date('Y-m-d');
        return view('pos.sale.history', compact('data', 'awal', 'akhir'));
    }

    public function filter(Request $request)
    {
        $awal = date('Y-m-d', strtotime($request->awal));
        $akhir = date('Y-m-d', strtotime($request->akhir));

        $data = Sale::whereDate('created_at', '>=', $awal)
            ->whereDate('created_at', '<=', $akhir)
            ->withCount('salelines')->orderBy('created_at', 'desc')->get();

        return view('pos.sale.history', compact('data', 'awal', 'akhir'));
    }

    public function show(Sale $sale)
    {
        return view('pos.sale.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
