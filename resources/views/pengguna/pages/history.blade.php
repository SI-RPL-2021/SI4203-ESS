@extends('pengguna.templates.default')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">History Pengajuan Layanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Pelayanan</th>
                        <th>Jenis Permohonan</th>
                        <th>Tanggal Permohonan</th>
                        <th>No Registrasi</th>
                        <th>Cetak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items1 as $item)
                    <tr>
                        <td>{{ $item->jenis_pelayanan }}</td>
                        <td>{{ $item->jenis_pelayanan }}</td>
                        <td>{{ $item->created_at->formatLocalized('%d %B %Y') }}</td>
                        <td>{{ $item->no_regis }}</td>
                        <td><button class="btn btn-primary">Cetak</button></td>
                    </tr>
                    @endforeach
                    @foreach ($items2 as $item)
                    <tr>
                        <td>{{ $item->jenis_pelayanan }}</td>
                        <td>{{ $item-> perubahan}} , {{ $item-> perpanjangan}}</td>
                        <td>{{ $item->created_at->formatLocalized('%d %B %Y') }}</td>
                        <td>{{ $item->no_regis }}</td>
                        <td><button class="btn btn-primary">Cetak</button></td>
                    </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection