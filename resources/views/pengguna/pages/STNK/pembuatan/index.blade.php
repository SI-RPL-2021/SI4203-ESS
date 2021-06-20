@extends('pengguna.templates.default')
@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('gagal'))
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
                    <h6 class="m-0 font-weight-bold text-primary">Pembuatan STNK</h6>
                    <a href="{{ route('pembuatan-stnk.create') }}" class="btn btn-sm btn-primary">Buat Permohonan</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Permohonan</th>
                                <th>No. STNK</th>
                                <th>Merk</th>
                                <th>Jenis</th>
                                <th>Masa Berlaku</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->created_at->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $item->no_stnk ?? 'Tidak Ada' }}</td>
                                <td>{{ $item->merk }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>
                                    @if ($item->masa_berlaku !== NULL)
                                    {{ $item->masa_berlaku->translatedFormat('d-m-Y') }}
                                    @else
                                    -
                                    @endif
                                </td>
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
                                    <a href="{{ route('pembuatan-stnk.show', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                                    @role('admin stnk')
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('pembuatan-stnk.status',$item->id) }}?status=GAGAL">Set Ditolak</a>
                                            <a class="dropdown-item" href="{{ route('pembuatan-stnk.status',$item->id) }}?status=MENUNGGU DIPROSES">Set Menunggu Proses</a>
                                            <a class="dropdown-item" href="{{ route('pembuatan-stnk.status',$item->id) }}?status=PROSES">Set Proses</a>
                                            <a class="dropdown-item" href="{{ route('pembuatan-stnk.status',$item->id) }}?status=SUKSES">Set Berhasil</a>
                                        </div>
                                    </div>
                                    <form action="{{ route('pembuatan-stnk.destroy',$item->id) }}" method="post" class="d-inline">
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