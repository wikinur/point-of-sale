@extends('layouts.master')

@section('title','Category')

@section('css')
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
@endsection

@section('content')
<div id="controller">
    <h1>@section('title', 'Category')</h1>
    @if(Session::has('status'))
        <script>Swal.fire('Sukses', '{{ Session::get('message') }}', 'success')</script>
    @endif
    @if(Session::has('gagal'))
        <script>Swal.fire('gagal', '{{ Session::get('message') }}', 'error')</script>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ url('category/create') }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-plus-circle"></i> Tambah</a>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>

              <div class="card-body table-responsive">
                <table class="table table-striped table-bordered" id="categoryTable">
                    <thead>
                        <th width="3%">No</th>
                        <th>Nama Kategori</th>
                        <th>Created at</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $i => $category)
                            <tr>
                                <th>{{ $i + 1 }}</th>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ convert_date($category->created_at) }}</td>
                                <td>
                                    <div class="d-flex alig-items-center justify-content-center">
                                        <a href="{{ url('category/'.$category->id_category.'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm text-white" title="edit"></i></a> &nbsp;

                                        <form action="{{ url('category', ['id' => $category->id_category]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Yakin Untuk Menghapus?');" type="submit" class="btn btn-sm btn-danger" title="delete"><i class="fas fa-trash fa-sm text-white-50"></i></button>
                                        </form>
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
</div>
@endsection

@section('js')
    <script>
        let table;
        $(function () {
            table = $('#categoryTable').DataTable({
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