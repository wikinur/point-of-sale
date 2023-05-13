@extends('layouts.master')

@section('title', 'Purchase')

@section('css')
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
@endsection

@section('content')
<div id="controller">
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
                        <a href="{{ url('purchase/create') }}" class="btn btn-success btn-flat-btn-sm"><i class="fa fa-plus"></i> Tambah</a>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

              <div class="card-body table-responsive">
                <table class="table table-stripped table-hover table-bordered" id="tableData">
                    <thead>
                        <th width="3%">No</th>
                        <th>Document no</th>
                        <th>Supplier</th>
                        <th>Status</th>
                        <th width="2%">Aksi</th>
                        <th width="2%">approved</th>
                    </thead>
                    <tbody>
                        @foreach ($purchases as $purchase)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $purchase->document_no }}</td>
                                <td>{{ $purchase->suppliers->supplier_name }}</td>
                                @if ($purchase->status_id == 1)
                                     <td>
                                        <span class="badge badge-warning">{{ $purchase->statuss->status }}</span>
                                    </td>  
                                @else
                                    <td>
                                        <span class="badge badge-success">{{ $purchase->statuss->status }}</span>
                                    </td>
                                @endif
                                <td>
                                    <a href="{{ url('purchase/'.$purchase->id_purchase) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('purchase/approved/'.$purchase->id_purchase) }}">
                                        <i class="fa fa-paint-brush"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
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
@endsection