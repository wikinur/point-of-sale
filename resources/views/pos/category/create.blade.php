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
            <div class="card card-primary">
                {{-- From Start --}}
                <form action="{{ url('category') }}" method="POST" autocomplete="off">
                    @csrf
                    {{-- Card-body Start --}}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control" name="category_name" placeholder="Enter name" value="{{ old('category_name') }}">
                        </div>
                    </div>
                    {{-- Card-body End --}}

                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                {{-- Form End --}}
            </div>
        </div>
    </div>
@endsection