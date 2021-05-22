@extends('pengguna.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Perpanjangan SIM {{ $data->sim->no_sim }}</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>No. Registrasi</th>
                            <td>{{ $data->sim->no_regis }}</td>
                        </tr>
                        <tr>
                            <th>No. SIM</th>
                            <td>{{ $data->sim->no_sim }}</td>
                        </tr>
                        <tr>
                            <th>Golongan SIM</th>
                            <td>{{ $data->sim->gol_sim }}</td>
                        </tr>
                        <tr>
                            <th>Masa Awal Berlaku</th>
                            <td>{{ $data->sim->masa_berlaku->subYears(5)->translatedFormat('d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Perpanjang Sampai</th>
                            <td>{{ $data->masa_berlaku->translatedFormat('d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Biaya</th>
                            <td>Rp. {{ number_format($data->biaya) }}</td>
                        </tr>
                        <tr>
                            <th>Polda Kedatangan</th>
                            <td>{{ $data->sim->polda_kedatangan }}</td>
                        </tr>
                        <tr>
                            <th>Satpas Kedatangan</th>
                            <td>{{ $data->sim->satpas_kedatangan }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Satpas</th>
                            <td>{{ $data->sim->alamat_satpas }}</td>
                        </tr>
                        <tr>
                            <th>KWN</th>
                            <td>{{ $data->sim->kwn }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>{{ $data->sim->nm_lngkp }}</td>
                        </tr>
                        <tr>
                            <th>Kode POS</th>
                            <td>{{ $data->sim->kd_pos }}</td>
                        </tr>
                        <tr>
                            <th>Kota</th>
                            <td>{{ $data->sim->kota }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $data->sim->alamat }}</td>
                        </tr>
                        <tr>
                            <th>No. HP</th>
                            <td>{{ $data->sim->no_hp }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <td>{{ $data->sim->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($data->sim->status === 0)
                                <span class="badge badge-danger">Ditolak</span>
                                @elseif ($data->sim->status === 1)
                                <span class="badge badge-warning">Menunggu Diproses</span>
                                @elseif ($data->sim->status === 2)
                                <span class="badge badge-info">Diproses</span>
                                @elseif ($data->sim->status === 3)
                                <span class="badge badge-success">Berhasil</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Akun</th>
                            <td>{{ $data->sim->user->username }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection