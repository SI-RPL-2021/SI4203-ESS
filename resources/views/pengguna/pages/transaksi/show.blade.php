@extends('pengguna.templates.default')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="text-dark font-weight-bold">Transaksi Detail</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordeless">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jenis Layanan</th>
                                <th>Keterangan</th>
                                <th>Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->details as $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->jenis_layanan }}</td>
                                <td>{{ $detail->keterangan }}</td>
                                <td>Rp. {{ number_format($detail->jumlah_bayar) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-center font-weight-bold">Total</td>
                                <td class="font-weight-bold">Rp. {{ number_format( $item->details->sum('jumlah_bayar')) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection