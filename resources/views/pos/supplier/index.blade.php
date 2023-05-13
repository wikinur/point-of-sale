@extends('layouts.master')

@section('title', 'Halaman Supplier')

@section('content')
<div id="controller">
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
                <table class="table table-striped table-bordered" id="tableData">
                    <thead>
                        <th width="3%">No</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Created at</th>
                        <th>Aksi</th>
                    </thead>
                </table>
              </div>
            </div>
        </div>
    </div>

    {{-- Modal Form --}}
    @includeIf('pos.supplier.form')
</div>
@endsection

@section('js')
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script>
        var actionUrl = '{{ url('supplier') }}';
        var apiUrl = '{{ url('api/supplier') }}';

        var columns = [
            {data: 'DT_RowIndex'},
            {data: 'supplier_name'},
            {data: 'address', orderable: false},
            {data: 'telpon', orderable: false},
            {data: 'date', orderable: false},
            {render: function(index, row, data, meta){
                return `
                    <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event,${meta.row})"><i class="fa fa-edit fa-sm text-white" title="edit"></i></a>
                    <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id_supplier})" title="delete"><i class="fa fa-trash fa-sm text-white"></i></a>
                `;
            }, orderable:false},
        ];

        var controller = new Vue({
            el:'#controller',
            data:{
                datas: [],
                dataSupplier: {},
                actionUrl,
                apiUrl,
                editStatus: false,
            },
            mounted: function(){
                this.data_table();
            },
            methods:{
                data_table(){
                    const _this = this;
                    _this.table = $('#tableData').DataTable({
                        lengthChange: true,
                        searching: true,
                        ordering: true,
                        ajax: {
                            url: _this.apiUrl,
                            type: 'GET',
                        },
                        columns,
                    }).on('xhr',function(){
                        _this.datas = _this.table.ajax.json().data;
                    });
                },
                addData(){
                    // console.log('add data');
                    this.dataSupplier = {};
                    this.editStatus= false;
                    $("#modalForm").modal();
                    $('.modal-title').text('Tambah Supplier');
                },
                editData(event, row){
                    // console.log(this.datas);
                    this.dataSupplier = this.datas[row];
                    this.editStatus= true;
                    $("#modalForm").modal();
                    $('.modal-title').text('Ubah Supplier');
                },
                deleteData(event, id_Supplier){
                    // console.log(id_Supplier);
                    const _this = this;
                    const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: true
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Apakah kamu yakin?',
                        text: 'Untuk menghapus data ini...',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $(event.target).parents('tr').remove();
                        axios.post(this.actionUrl+ '/' + id_Supplier, {_method: 'DELETE'}).then(response =>{
                            _this.table.ajax.reload();
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Data Berhasil di Hapus.',
                                'success'
                            )
                        })

                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                'Cancelled',
                                'Hapus Data dibatalkan :)',
                                'error'
                            )
                        }
                    })
                },
                submitForm(event, id_Supplier){
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id_Supplier;
                    axios.post(actionUrl, new FormData($(event.target)[0]))
                    .then(response=>{
                        $('#modalForm').modal('hide');
                        _this.table.ajax.reload();
                        Swal.fire('Sukses', 'Data Berhasil disimpan', 'success')
                    })
                    .catch(err => {
                        console.log(err);
                        if(err.response.status == 422){
                            Swal.fire('Gagal', 'Periksa Kembali Data yang Anda masukkan', 'error')
                        }
                    })
                }
            },
        });
    </script>
@endsection