@extends('layouts.master')

@section('title', 'Tambah Category')

@section('css')
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <script>Swal.fire('Error', '{{ $error }}', 'error')</script>
                    @endforeach
                </ul>
            @endif
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('category') }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-backward"></i> Kembali</a>
                </div>
                <form action="{{ url('category') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control" name="category_name" placeholder="Enter name category" value="{{ old('category_name') }}">
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-sm btn-flat">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection