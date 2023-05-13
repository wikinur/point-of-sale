@extends('layouts.master')

@section('title', 'Penjualan Barang')

@section('css')
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
@endsection

@section('content')
    @if(Session::has('status'))
        <script>Swal.fire('Sukses', '{{ Session::get('message') }}', 'success')</script>
    @endif
     @if(Session::has('status2'))
        <script>Swal.fire('Error', '{{ Session::get('message') }}', 'error')</script>
    @endif
    <div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('/history') }}" class="btn btn-success btn-flat-btn-sm"><i class="fa fa-backward"></i> Riwayat Penjualan</a>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <input type="hidden" name="grand_total">
                    
                    <div class="card-body">
                        <div class="form-group col-md-8 offset-md-2">
                            <label>Scan Barcode</label>
                            <input type="text" class="form-control" name="barcode">
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ url('sale') }}" method="POST" autocomplete="off">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-stripped table-bordered" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>Kode Produk</th>
                                                    <th>Nama Product</th>
                                                    <th>Harga Jual</th>
                                                    <th>Qty</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody class="product-ajax">

                                            </tbody>                                     
                                    </table>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-stripped" id="myTable">
                                                <tbody>
                                                    <tr>
                                                        <th>Jumlah Bayar</th>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="number" name="total_cost" class="form-control">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>  
@endsection

@section('js')
    <script>
        let table;
        $(function () {
            table = $('#tableData').DataTable({
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
            $("input[name='barcode']").focus();
            $("input[name='grand_total']").val(0);
            $("input[name='total_cost']").val('');

            $("input[name='barcode']").keypress(function(e){
                if(e.which == 13){
                    e.preventDefault();
                    var code = $(this).val();
                    var url = "{{ url('product/ajax') }}"+'/'+code;
                    var _this = $(this);

                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: url,
                        success:function(data){
                            console.log(data);
                            _this.val('');

                            var tableColumn = '';

                            tableColumn += '<tr>';
                                tableColumn += '<td>';
                                    tableColumn += data.prd.code_product
                                    tableColumn += '<input type="hidden" class="form-control" name="product_id[]" value="'+data.prd.id_product+'">';
                                tableColumn += '</td>';

                                tableColumn += '<td>';
                                    tableColumn += data.prd.product_name
                                tableColumn += '</td>';

                                tableColumn += '<td>';
                                    tableColumn += data.prd.selling_price
                                    tableColumn += '<input type="hidden" class="form-control" name="selling_price[]" value="'+data.prd.selling_price+'">';
                                tableColumn += '</td>';

                                tableColumn += '<td>';
                                    tableColumn += '<input type="number" class="form-control" name="qty[]" value="1">';
                                tableColumn += '</td>';

                                tableColumn += '<td>';
                                    tableColumn += '<button class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>';
                                tableColumn += '</td>';
                            tableColumn += '</tr';

                            var total = parseInt($("input[name='grand_total']").val());
                            total += data.prd.selling_price;

                            $("input[name='grand_total']").val(total);
                            $('.product-ajax').append(tableColumn);
                            $("input[name='total_cost']").val(0);
                        }
                    });
                }
            })
            
            // Delete
            $('body').on('click', '.delete', function(e){
                e.preventDefault();
                $(this).closest('tr').remove();
            })

            // SUbmit
            // $("button[type='submit']").click(function(e){
            //     var grand_total = parseInt($("input[name='grand_total']").val());
            //     var total_cost = parseInt($("input[name='total_cost']").val());
            //     if(total_cost < grand_total){
            //         e.preventDefault();
            //         alert('uang kurang');
            //     }
            //     // alert(grand_total);
            // });

            // Jumlah bayar
            // $("input[name='total_cost']").keyup(function(e){
            //     var grand_total = parseInt($("input[name='grand_total']").val());
            //     var total_cost = parseInt($(this).val());

            //     var kembalian = total_cost - grand_total;

            //     $('.kembalian').text(kembalian);
            // });
        });
    </script>
@endsection