<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Models\Purchase_order;
use App\Models\Purchase_order_line;
use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchases = Purchase_order::with(['suppliers', 'statuss', 'lines'])
            ->orderby('supplier_id')
            ->get();

        return view('pos.purchase.index', compact('purchases'));
    }

    public function viewpdf($id_purchase)
    {
        // $data = Purchase_order::with('suppliers')->find($id_purchase);
        // $pdf = PDF::loadHTML('<h1>berhasil</h1>');
        // return $pdf->stream();
        $purchase = Purchase_order::with(['suppliers', 'statuss', 'lines'])->find($id_purchase);
        $ph = Company::first();

        return view('pos.purchase.pdf', compact('purchase', 'ph'));

    }

    public function create()
    {
        $document_no = 'PO-' . date('Ymdhis') . rand(1, 10000);
        $suppliers = Supplier::orderBy('supplier_name', 'asc')->get();
        return view('pos.purchase.create', compact('document_no', 'suppliers'));
    }

    public function get_product($supplier_id)
    {
        $document_no = 'PO-' . date('Ymdhis') . rand(1, 10000);
        $suppliers = Supplier::orderBy('supplier_name', 'asc')->get();
        $products = Product::where('supplier_id', $supplier_id)->get();

        return view('pos.purchase.create', compact('document_no', 'suppliers', 'products', 'supplier_id'));
    }

    public function store(Request $request)
    {
        try {
            $product_id = $request->product_id;
            $qty = $request->qty;

            $document_no = $request->document_no;
            $supplier_id = $request->supplier_id;

            DB::transaction(function () use ($product_id, $qty, $document_no, $supplier_id) {
                $id_po = Purchase_order::insertGetId([
                    'document_no' => $document_no,
                    'supplier_id' => $supplier_id,
                    'status_id' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                foreach ($qty as $i => $qt) {
                    if ($qt == 0) {
                        continue;
                    }

                    $dt_product = Product::where('id_product', $product_id[$i])->first();
                    $buy = $dt_product->purchase_price;
                    $grand_total = $qt * $buy;

                    Purchase_order_line::insert([
                        'purchase_order_id' => $id_po,
                        'product_id' => $product_id[$i],
                        'qty' => $qt,
                        'buy' => $buy,
                        'grand_total' => $grand_total,
                    ]);
                }
            });
            Session::flash('status', 'success');
            Session::flash('message', 'Simpan data berhasil');
        } catch (exception $e) {
            Session::flash('gagal', $e->getMessage());
        }
        return redirect('purchase');
    }

    public function approved($id_purchase)
    {
        try {
            Purchase_order::where('id_purchase', $id_purchase)->update([
                'status_id' => 2,
            ]);
            Session::flash('status', 'success');
            Session::flash('message', 'Data Berhasil Diapproved');
        } catch (Exception $e) {
            Session::flash('status', $e->getMessage());
        }
        return redirect('purchase');
    }
    public function show(Purchase_order $purchase)
    {
        // return $purchase;
        return view('pos.purchase.show', compact('purchase'));
    }

    public function update(Request $request)
    {
        $qty = $request->qty;
        $id_line = $request->id_po_line;
        $buy = $request->buy;
        $product_id = $request->product_id;

        foreach ($qty as $i => $qt) {
            $data['qty'] = $qt;
            $data['grand_total'] = $buy[$i] * $qt;
            $data['buy'] = $buy[$i];
            $line = $id_line[$i];

            Purchase_order_line::where('id_po_line', $line)->update($data);

            Product::where('id_product', $product_id[$i])->update(['purchase_price' => $data['buy']]);
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Data Berhasil Diupdate');
        return redirect()->back();
    }

    public function delete_line($id_po_line)
    {
        $po_line = Purchase_order_line::where('id_po_line', $id_po_line)->delete();
        if ($po_line) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data Berhasil Hapus');
        }
        return redirect()->back();
    }
}
