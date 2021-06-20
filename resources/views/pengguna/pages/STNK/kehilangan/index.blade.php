@extends('pengguna.templates.default')
@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif (session('gagal'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Gagal!</strong> {{ session('gagal') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Kehilangan STNK</h6>
                    <a href="{{ route('kehilangan-stnk.create') }}" class="btn btn-sm btn-primary">Buat laporan</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. STNK</th>
                                <th>Nama Pemilik</th>
                                <th>Type</th>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                                <th>File</th>
                                <th>Status</th>
                                @role('admin stnk')
                                <th>Aksi</th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->stnk->no_stnk }}</td>
                                <td>{{ $item->stnk->nama_pemilik }}</td>
                                <td>{{ $item->stnk->jenis }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    @if ($item->status === 'GAGAL')
                                    <span class="badge badge-danger">Ditolak</span>
                                    @elseif ($item->status === 'MENUNGGU DIPROSES')
                                    <span class="badge badge-warning">Menunggu Diproses</span>
                                    @elseif ($item->status === 'PROSES')
                                    <span class="badge badge-info">Diproses</span>
                                    @elseif ($item->status === 'SUKSES')
                                    <span class="badge badge-success">Berhasil</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group mr-1">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('kehilangan-stnk.status',$item->id) }}?status=0">Set Ditolak</a>
                                            <a class="dropdown-item" href="{{ route('kehilangan-stnk.status',$item->id) }}?status=1">Set Menunggu Proses</a>
                                            <a class="dropdown-item" href="{{ route('kehilangan-stnk.status',$item->id) }}?status=2">Set Proses</a>
                                            <a class="dropdown-item" href="{{ route('kehilangan-stnk.status',$item->id) }}?status=3">Set Berhasil</a>
                                        </div>
                                    </div>
                                    <form action="{{ route('kehilangan-stnk.destroy',$item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
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
@push('afterStyle')
<!-- Custom styles for this page -->
<link href="{{ asset('assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@push('afterScripts')
<!-- Page level plugins -->
<script src="{{ asset('assets/sbadmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endpush