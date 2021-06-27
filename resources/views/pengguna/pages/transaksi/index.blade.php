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
                    <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th>Jumlah Bayar</th>
                                <th>Status</th>
                                <th width=150>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ $item->metode_pembayaran }}</td>
                                <td><a href="{{ route('transaksi.download', $item->id) }}" class="btn btn-sm btn-success" title="Download"><i class="fas fa-download"></i>Download</a></td>
                                <td>Rp. {{ number_format($item->jumlah_bayar) }}</td>
                                <td>
                                    @if ($item->status === 'GAGAL')
                                    <span class="badge badge-danger">GAGAL</span>
                                    @elseif ($item->status === 'MENUNGGU VERIFIKASI')
                                    <span class="badge badge-warning">Menunggu Verifikasi</span>
                                    @elseif ($item->status === 'SUKSES')
                                    <span class="badge badge-success">Berhasil</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('transaksi.show', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                                    @role('admin sim|admin stnk')
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('transaksi.status',$item->id) }}?status=GAGAL">Set Gagal</a>
                                            <a class="dropdown-item" href="{{ route('transaksi.status',$item->id) }}?status=MENUNGGU VERIFIKASI">Menunggu Verifikasi</a>
                                            <a class="dropdown-item" href="{{ route('transaksi.status',$item->id) }}?status=SUKSES">Set Berhasil</a>
                                        </div>
                                    </div>
                                    <form action="{{ route('transaksi.destroy', $item->id) }}" method="post" class="d-inline">
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