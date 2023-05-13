@extends('layouts.master')

@section('title', 'create Purchase')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('purchase') }}" method="POST" autocomplete="off">
                @csrf
                <div class="card">
                    <div class="card-header">
                        {{-- <a href="{{ url('purchase') }}" class="btn btn-success btn-flat-btn-sm"><i class="fa fa-backward"></i> Back</a> --}}
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Document No</label>
                            <input type="text" class="form-control" name="document_no" value="{{ $document_no }}" readonly>
                        </div>
                        @if(isset($supplier_id))
                            <div class="form-group">
                                <label for="supplier_id" class="form-label">Nama Supplier</label>
                                <select name="supplier_id" id="supplier_id" class="form-control">
                                    <option selected="" disabled>Pilih Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id_supplier }}" {{ ($supplier_id == $supplier->id_supplier) ? 'selected' : '' }}>{{ $supplier->supplier_name }}</option>
                                    @endforeach                           
                                </select>
                            </div>
                        @else
                            <div class="form-group">
                                <label for="supplier_id" class="form-label">Nama Supplier</label>
                                <select name="supplier_id" id="supplier_id" class="form-control">
                                    <option selected="" disabled>Pilih Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id_supplier }}">{{ $supplier->supplier_name }}</option>
                                    @endforeach                           
                                </select>
                            </div>
                        @endif
                    </div>

                    @if (isset($products))
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-stripped table-bordered" id="myTable">
                                        <thead>
                                            <tr>
                                                <th width="3%">No</th>
                                                <th>Nama</th>
                                                <th>Harga Beli</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>        
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>Rp. {{ number_format($product->purchase_price) }}</td>
                                                    <td>
                                                        <input type="hidden" name="product_id[]" value="{{ $product->id_product }}">
                                                        <input type="number" value="0" class="form-control" name="qty[]">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>                                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let table;
        $(function () {
            table = $('#myTable').DataTable({
                processing: true,
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("select[name='supplier_id']").change(function(e){
                var id_supplier = $(this).val();
                var url = '{{ url('purchase/product') }}' +  '/' + id_supplier;

                window.location.href = url;
            })
        })
    </script>
@endsection