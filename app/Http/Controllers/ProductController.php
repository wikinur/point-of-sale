<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        // cara eager loading -->lebih hemat koneksi ke database
        $products = Product::with(['categories', 'supplier'])->get();
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('pos.product.index', compact('products', 'categories', 'suppliers'));
    }

    public function store(ProductCreateRequest $request)
    {
        $category_id = $request->category_id;
        $supplier_id = $request->supplier_id;
        $code_product = 'PRD-' . date('Ymd') . date('His');
        $product_name = $request->product_name;
        $purchase_price = $request->purchase_price;
        $selling_price = $request->selling_price;
        $stock = 12;
        // Product::create($request->all());
        $product = Product::insert([
            'category_id' => $category_id,
            'supplier_id' => $supplier_id,
            'code_product' => $code_product,
            'product_name' => $product_name,
            'purchase_price' => $purchase_price,
            'selling_price' => $selling_price,
            'stock' => $stock,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if ($product) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Berhasil');
        }
        return redirect('product');

    }

    public function show(Product $product)
    {
        // return $product;
        return view('pos/product/show', compact('product'));
    }

    public function update(ProductCreateRequest $request, Product $product)
    {
        $product->update($request->all());
        if ($product) {
            Session::flash('status', 'success');
            Session::flash('message', 'Ubah Data Berhasil');
        }
        return redirect('product');

    }

    public function destroy(Product $product)
    {
        $product->delete();
        if ($product) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil dihapus');
        }
        return redirect('product');
    }
}
