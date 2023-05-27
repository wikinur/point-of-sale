@extends('layouts.master')

@section('title', 'Detail Data Produk')

@section('css')
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
@endsection

@section('content')
    <div class="row">
            @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <script>Swal.fire('Error', '{{ $error }}', 'error')</script>
            @endforeach
        </ul>
    @endif
    @if(Session::has('status'))
        <script>Swal.fire('Sukses', '{{ Session::get('message') }}', 'success')</script>
    @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-space-between">
                        <a href="{{ url('purchase') }}" class="btn btn-success btn-flat btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                        &nbsp;
                        <form action="{{ url('pdf/'.$purchase->id_purchase) }}" method="post" target="_blank">
                            @csrf
                            <button class="btn btn-danger btn-flat btn-sm"><i class="fa fa-download"></i> Export PDF</button>
                        </form>
                    </div>
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
                            <th>Document No</th>
                            <td>:</td>
                            <td>{{ $purchase->document_no }}</td>

                            <th>Supplier</th>
                            <td>:</td>
                            <td>{{ $purchase->suppliers->supplier_name }}</td>

                            <th>Status</th>
                            <td>:</td>
                            @if ($purchase->status_id == 1)
                                <td>
                                    <span class="badge badge-warning">{{ $purchase->statuss->status }}</span>
                                </td>  
                            @else
                                <td>
                                    <span class="badge badge-success">{{ $purchase->statuss->status }}</span>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
              </div>

            <div class="card-body table-responsive">
                <form action="{{ url('purchase/'.$purchase->id_purchase) }}" method="POST">
                    @csrf
                    @method('put')
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Harga Beli</th>
                                <th>Grand Total</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total_qty = 0;
                                $total_buy = 0;
                                $total = 0;

                                
                            ?>
                            @foreach ($purchase->lines as $pro)
                                <?php
                                    $total_qty += $pro->qty;
                                    $total_buy += $pro->buy;
                                    $total += $pro->grand_total
                                ?>
                                <tr>
                                    <td>{{ $pro->products->product_name }}</td>
                                    @if($purchase->status_id == 1)
                                        <td>
                                            <input type="number" class="form-control" name="qty[]" value="{{ $pro->qty }}">
                                            <input type="hidden" name="id_po_line[]" value="{{ $pro->id_po_line }}">
                                            <input type="hidden" name="product_id[]" value="{{ $pro->product_id }}">
                                        </td>
                                    @else
                                        <td>{{ $pro->qty }}</td>
                                    @endif
                                    @if($purchase->status_id == 1)
                                        <td>
                                            <input type="number" class="form-control" name="buy[]" value="{{ $pro->buy }}">
                                        </td>
                                    @else
                                         <td>{{ $pro->buy }}</td>
                                    @endif
                                    <td>Rp. {{ number_format($pro->grand_total) }},-</td>
                                    <td>
                                        <a type="button"  href="{{ url('purchase/line/'.$pro->id_po_line) }}" onclick="return confirm('Yakin Untuk Menghapus?');" class="btn btn-sm btn-danger" id="btn-hapus">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    <b><i>Jumlah</i></b>
                                </th>
                                <th>
                                    <b><i>{{ $total_qty }}</i></b>
                                </th>
                                <th>
                                    <b><i>Rp. {{ number_format($total_buy, 0) }}</i></b>
                                </th>
                                <th>
                                    <b><i>Rp. {{ number_format($total, 0) }}</i></b>
                                </th>
                            </tr>
                        </tfoot>
                    </table>

                    <div>
                        @if($purchase->status_id == 1)
                            <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                        @endif
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
@endsection