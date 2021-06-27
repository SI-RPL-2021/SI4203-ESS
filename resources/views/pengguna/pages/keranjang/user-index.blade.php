@extends('pengguna.templates.default')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="text-dark font-weight-bold">Keranjang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jenis Layanan</th>
                                <th>Keterangan</th>
                                <th>Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->jenis_layanan }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>Rp. {{ number_format($item->biaya) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak Ada!</td>
                            </tr>
                            @endforelse

                            @if(!$items->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center font-weight-bold">Total</td>
                                <td class="font-weight-bold">Rp. {{ number_format( $items->sum('biaya')) }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBayar">
                                        Bayar
                                    </button>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalBayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('checkout') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="pembayaran">Pembayaran</label>
                        <select name="pembayaran" id="pembayaran" class="form-control">
                            @foreach ($data_pembayaran as $pembayaran)
                            <option value="{{ $pembayaran->nama }}">{{ $pembayaran->nama . ' - ' . $pembayaran->nomor}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bukti_pembayaran">Bukti Pembayaran</label>
                        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Total</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="font-weight-bold text-right">Rp. {{ number_format($items->sum('biaya')) }}</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection