@extends('layouts.master')

@section('title', 'Product')

@section('css')
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
@endsection

@section('content')
<div id="controller">
    <h1>@section('title', 'product')</h1>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <a href="#" @click="addData()" class="btn btn-success btn-sm btn-flat"><i class="fa fa-plus-circle"></i> Tambah</a>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>

              <div class="card-body table-responsive">
                <table class="table table-hover table-bordered" id="productTable">
                    <thead>
                        <th width="3%">No</th>
                        <th>Kode Produk</th>
                        <th>Nama Kategori</th>
                        <th>Nama Supplier</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="badge badge-success">{{ $product->code_product }}</span></td>
                                <td>{{ $product->categories->category_name }}</td>
                                <td>{{ $product->supplier->supplier_name }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->purchase_price }}</td>
                                <td>
                                    <div class="d-flex alig-items-center justify-content-center">
                                        <a href="#" @click="editData({{ $product }})" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm text-white" title="edit"></i></a> &nbsp;

                                        <a href="#" @click="deleteData({{ $product->id_product }})" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm text-white" title="delete"></i></a> &nbsp;

                                        <a href="{{ url('product/'.$product->id_product) }}" class="btn btn-info btn-sm"><i class="fa fa-eye fa-sm text-white" title="detail"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>

    {{-- Modal Form --}}
    @includeIf('pos.product.form')
</div>
@endsection

@section('js')
    <script>
        let table;
        $(function () {
            table = $('#productTable').DataTable({
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
        var controller = new Vue({
            el: '#controller',
            data: {
                dataProduct: {},
                actionUrl: '{{ url('product') }}',
                editStatus: false
            },
            mounted: function(){

            },
            methods: {
                addData(){
                    // console.log('add data');
                    this.dataProduct = {};
                    this.actionUrl = '{{ url('product') }}';
                    this.editStatus= false;
                    $('#modalForm').modal('show');
                    $('.modal-title').text('Tambah Produk');
                },
                editData(product){
                    // console.log(product);
                    this.dataProduct = product;
                    this.actionUrl = '{{ url('product') }}' + '/' + product.id_product;
                    this.editStatus= true;
                    $('#modalForm').modal('show');
                    $('.modal-title').text('Ubah Produk');
                },
                deleteData(id_product){
                    // console.log(id_product);
                    this.actionUrl = '{{ url('product') }}' + '/' + id_product;
                    if(confirm('Yakin ingin menghapus')){
                        axios.post(this.actionUrl, {_method: 'DELETE'}).then(response =>{
                            Swal.fire('Sukses', 'Data Berhasil dihapus', 'success')
                        });
                    }
                }
            }
        });
    </script>
@endsection