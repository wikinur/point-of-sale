@extends('layouts.master')

@section('title', 'Riwayat Penjualan')

@section('content')
    <div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('/sale') }}" class="btn btn-success btn-flat btn-sm"><i class="fa fa-backward"></i> Kembali</a>

                        <button class="btn btn-flat btn-sm btn-info btn-filter">
                                <i class="fas fa-filter"> Filter Tanggal</i>
                        </button>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped" id="tableData">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Struk</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Kembalian</th>
                                    <th>Grand Total</th>
                                    <th>Total item</th>
                                    <th>Tanggal</th>
                                    <th>Detail</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i => $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->no_struk }}</td>
                                        <td>Rp. {{ number_format($item->total_cost) }},-</td>
                                        <td>Rp. {{ number_format($item->kembalian) }},-</td>
                                        <td>Rp. {{ number_format($item->grand_total) }},-</td>
                                        <td>{{ $item->salelines_count }}</td>
                                        <td>{{ convert_date($item->created_at) }}</td>
                                        <td>
                                            <a href="{{ url('sale',$item->id_sale) }}" class="btn btn-sm btn-info">Detail</a>
                                        </td>                                        
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>
                                        <b><i>Total</i></b>
                                    </th>
                                    <th>
                                        <b><i>{{ $item->total_jumlah_bayar($awal, $akhir) }}</i></b>
                                    </th>
                                    <th>
                                        <b><i>{{ $item->total_kembalian($awal, $akhir) }}</i></b>
                                    </th>
                                    <th>
                                        <b><i>{{ $item->total_grand_total($awal, $akhir) }}</i></b>
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
        </div>
    </div>

      <div class="modal fade" id="modal-filter">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Filter Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/filter') }}" method="get" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tanggal Awal</label>
                        <input type="date" class="form-control" name="awal" value="{{ $awal }}">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="akhir" value="{{ $akhir }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
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
            $('.btn-filter').click(function(e){
                e.preventDefault();
                $('#modal-filter').modal();
            })
        });
    </script>
@endsection