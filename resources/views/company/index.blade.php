@extends('layouts.master')

@section('title','Profil Perusahaan')

@section('css')
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
@endsection

@section('content')
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
                        <a href="{{ url('/sale') }}" class="btn btn-success btn-flat btn-sm"><i class="fa fa-backward"></i> Kembali</a>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{ url('company/'.$company->id) }}" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-md-2 offset-1 form-label">Nama Perusahaan</label>
                                <div class="col-md-7 offset-md-1">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-2 offset-1 form-label">Alamat</label>
                                <div class="col-md-7 offset-md-1">
                                    <textarea name="address" id="address" class="form-control" cols="5" rows="10">{{ $company->address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_telp" class="col-md-2 offset-1 form-label">Telepon</label>
                                <div class="col-md-7 offset-md-1">
                                    <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ $company->no_telp }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-2 offset-1 form-label">Email</label>
                                <div class="col-md-7 offset-md-1">
                                    <input type="emai" name="email" id="email" class="form-control" value="{{ $company->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm btn-flat">Simpan</button>
                            <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection