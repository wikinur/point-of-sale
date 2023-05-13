@extends('layouts.master')

@section('title', 'Detail Penjualan')

@section('content')
    <div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('/history') }}" class="btn btn-success btn-flat-btn-sm"><i class="fa fa-backward"></i> Kembali</a>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table" id="tableData">
                            <tbody>
                                <tr>
                                    <th>No Struk</th>
                                    <td>:</td>
                                    <td>{{ $sale->no_struk }}</td>

                                    <th>Jumlah Bayar</th>
                                    <td>:</td>
                                    <td>Rp. {{ number_format($sale->total_cost) }},-</td>
                                </tr>

                                <tr>
                                    <th>Kembalian</th>
                                    <td>:</td>
                                    <td>Rp. {{ number_format($sale->kembalian) }},-</td>

                                    <th>Grand Total</th>
                                    <td>:</td>
                                    <td>Rp. {{ number_format($sale->grand_total) }},-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table" id="tableData">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Sub Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sale->salelines as $item)
                                    <tr>
                                        <td>{{ $item->product->product_name }}</td>
                                        <td>{{ $item->selling_price }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->grand_total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
@endsection