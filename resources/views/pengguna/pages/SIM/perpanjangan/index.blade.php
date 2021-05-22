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
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Perpanjangan SIM</h6>
                    <a href="{{ route('perpanjangan-sim.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>No. SIM</th>
                                <th>Golongan</th>
                                <th>No. Regis</th>
                                <th>Alamat</th>
                                <th>Pekerjaan</th>
                                <th>Username</th>
                                <th>Masa Berlaku</th>
                                <th>Biaya</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->sim->nm_lngkp }}</td>
                                <td>{{ $item->sim->no_sim }}</td>
                                <td>{{ $item->sim->no_regis }}</td>
                                <td>{{ $item->sim->alamat }}</td>
                                <td>{{ $item->sim->pekerjaan }}</td>
                                <td>{{ $item->sim->gol_sim }}</td>
                                <td>{{ $item->sim->user->username }}</td>
                                <td>{{ $item->masa_berlaku->translatedFormat('l, d F Y') }}</td>
                                <td>Rp. {{ number_format($item->biaya) }}</td>
                                <td>
                                    @if ($item->status === 0)
                                    <span class="badge badge-danger">Ditolak</span>
                                    @elseif ($item->status === 1)
                                    <span class="badge badge-warning">Menunggu Diproses</span>
                                    @elseif ($item->status === 2)
                                    <span class="badge badge-info">Diproses</span>
                                    @elseif ($item->status === 3)
                                    <span class="badge badge-success">Berhasil</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group mr-1">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        @role('admin sim')
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('perpanjangan-sim.status',$item->id) }}?status=0">Set Ditolak</a>
                                            <a class="dropdown-item" href="{{ route('perpanjangan-sim.status',$item->id) }}?status=1">Set Menunggu Proses</a>
                                            <a class="dropdown-item" href="{{ route('perpanjangan-sim.status',$item->id) }}?status=2">Set Proses</a>
                                            <a class="dropdown-item" href="{{ route('perpanjangan-sim.status',$item->id) }}?status=3">Set Berhasil</a>
                                        </div>
                                    </div>
                                    <form action="{{ route('perpanjangan-sim.destroy',$item->id) }}" method="post" class="d-inline">
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