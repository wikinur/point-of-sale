@extends('layouts.master')

@section('title', 'Detail Data Produk')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <a href="{{ url('product') }}" class="btn btn-success btn-flat-btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

              <div class="card-body table-responsive">
                <table class="table table-stripped">
                    <tbody>
                        <tr>
                            <th>Barcode</th>
                            <td>:</td>
                            <td>{!! \DNS1D::getBarcodeHTML($product->code_product, 'C39') !!}</td>

                            <th>Nama Produk</th>
                            <td>:</td>
                            <td>{{ $product->product_name }}</td>
                        </tr>
                        <tr>
                            <th>Nama Supplier</th>
                            <td>:</td>
                            <td>{{ $product->supplier->supplier_name }}</td>

                            <th>Kode Produk</th>
                            <td>:</td>
                            <td>{{ $product->code_product }}</td>
                        </tr>

                        <tr>
                            <th>Nama Kategori</th>
                            <td>:</td>
                            <td>{{ $product->categories->category_name }}</td>

                            <th>Stok</th>
                            <td>:</td>
                            <td>{{ $product->stock }}</td>
                        </tr>

                        <tr>
                            <th>Harga Beli</th>
                            <td>:</td>
                            <td> Rp. {{ number_format($product->purchase_price) }},-</td>

                            <th>Harga Jual</th>
                            <td>:</td>
                            <td>Rp. {{ number_format($product->selling_price) }},-</td>
                        </tr>

                        <tr>
                            <th>created At</th>
                            <td>:</td>
                            <td>{{ convert_date($product->created_at) }}</td>

                            <th>Updated At</th>
                            <td>:</td>
                            <td>{{ convert_date($product->updated_at) }}</td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
@endsection