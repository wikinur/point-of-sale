<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierCreateRequest;
use App\Models\Supplier;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    public function index()
    {
        return view('pos.supplier.index');
    }

    public function api()
    {
        $suppliers = Supplier::all();
        $datatables = datatables()->of($suppliers)
            ->addColumn('date', function ($supplier) {
                return convert_date($supplier->created_at);
            })
            ->addIndexColumn();
        return $datatables->make(true);
    }

    public function store(SupplierCreateRequest $request)
    {
        Supplier::create($request->all());
    }

    public function update(SupplierCreateRequest $request, Supplier $supplier)
    {
        $supplier = $supplier->update($request->all());
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        if ($supplier) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil dihapus');
        }
        return redirect('supplier');
        // return response()->json('sukses', 200);
    }
}
