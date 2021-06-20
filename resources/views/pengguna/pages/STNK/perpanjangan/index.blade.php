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
    <strong>Sukses!</strong> {{ session('gagal') }}
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
                    <h6 class="m-0 font-weight-bold text-primary">Perpanjangan STNK</h6>
                    <a href="{{ route('perpanjangan-stnk.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pemilik</th>
                                <th>No. STNK</th>
                                <th>Jenis</th>
                                <th>Masa Berlaku</th>
                                <th>Perpanjang Sampai</th>
                                <th>Biaya</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->stnk->nama_pemilik }}</td>
                                <td>{{ $item->stnk->no_stnk }}</td>
                                <td>{{ $item->stnk->jenis }}</td>
                                <td>{{ $item->masa_berlaku_sebelumnya->translatedFormat('d F Y') }}</td>
                                <td>{{ $item->perpanjang_sampai->translatedFormat('d F Y') }}</td>
                                <td>Rp. {{ number_format($item->biaya) }}</td>
                                <td>
                                    @if ($item->status === 'GAGAL')
                                    <span class="badge badge-danger">Ditolak</span>
                                    @elseif ($item->status === 'MENUNGGU DIPROSES')
                                    <span class="badge badge-warning">Menunggu Diproses</span>
                                    @elseif ($item->status === 'PROSES')
                                    <span class="badge badge-info">Diproses</span>
                                    @elseif ($item->status ==='SUKSES')
                                    <span class="badge badge-success">Berhasil</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('perpanjangan-stnk.show', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                                    @role('admin stnk')
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            @if ($item->status === 'SUKSES')
                                            <a class="dropdown-item" href="{{ route('perpanjangan-stnk.status',$item->id) }}?status=GAGAL">Set Ditolak</a>
                                            <a class="dropdown-item" href="{{ route('perpanjangan-stnk.status',$item->id) }}?status=PROSES">Set Proses</a>
                                            @elseif($item->status === 'PROSES')
                                            <a class="dropdown-item" href="{{ route('perpanjangan-stnk.status',$item->id) }}?status=GAGAL">Set Ditolak</a>
                                            <a class="dropdown-item" href="{{ route('perpanjangan-stnk.status',$item->id) }}?status=SUKSES">Set Berhasil</a>
                                            @elseif($item->status === 'GAGAL')
                                            <a class="dropdown-item" href="{{ route('perpanjangan-stnk.status',$item->id) }}?status=PROSES">Set Proses</a>
                                            <a class="dropdown-item" href="{{ route('perpanjangan-stnk.status',$item->id) }}?status=SUKSES">Set Berhasil</a>
                                            @endif
                                        </div>
                                    </div>
                                    <form action="{{ route('perpanjangan-stnk.destroy',$item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                    @endrole
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