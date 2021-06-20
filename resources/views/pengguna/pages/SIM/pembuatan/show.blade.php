@extends('pengguna.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail {{ $data->no_regis }}</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>No. Registrasi</th>
                            <td>{{ $data->no_regis }}</td>
                        </tr>
                        <tr>
                            <th>No. SIM</th>
                            <td>{{ $data->no_sim }}</td>
                        </tr>
                        <tr>
                            <th>Golongan SIM</th>
                            <td>{{ $data->gol_sim }}</td>
                        </tr>
                        <tr>
                            <th>Masa Berlaku</th>
                            <td>{{ $data->masa_berlaku->translatedFormat('l, d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Polda Kedatangan</th>
                            <td>{{ $data->polda_kedatangan }}</td>
                        </tr>
                        <tr>
                            <th>Satpas Kedatangan</th>
                            <td>{{ $data->satpas_kedatangan }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Satpas</th>
                            <td>{{ $data->alamat_satpas }}</td>
                        </tr>
                        <tr>
                            <th>KWN</th>
                            <td>{{ $data->kwn }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>{{ $data->nm_lngkp }}</td>
                        </tr>
                        <tr>
                            <th>Tinggi Badan</th>
                            <td>{{ $data->tinggi }}</td>
                        </tr>
                        <tr>
                            <th>Golongan Darah</th>
                            <td>{{ $data->gol_darah }}</td>
                        </tr>
                        <tr>
                            <th>Kode POS</th>
                            <td>{{ $data->kd_pos }}</td>
                        </tr>
                        <tr>
                            <th>Kota</th>
                            <td>{{ $data->kota }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $data->alamat }}</td>
                        </tr>
                        <tr>
                            <th>No. HP</th>
                            <td>{{ $data->no_hp }}</td>
                        </tr>
                        <tr>
                            <th>Pendidikan</th>
                            <td>{{ $data->pendidikan }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <td>{{ $data->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th>Hubungan</th>
                            <td>{{ $data->hubungan }}</td>
                        </tr>
                        <tr>
                            <th>Nama KD</th>
                            <td>{{ $data->nama_KD }}</td>
                        </tr>
                        <tr>
                            <th>Alamat KD</th>
                            <td>{{ $data->alamat_KD }}</td>
                        </tr>
                        <tr>
                            <th>Telepon KD</th>
                            <td>{{ $data->telepon_KD }}</td>
                        </tr>
                        <tr>
                            <th>Nama Ibu KD</th>
                            <td>{{ $data->nama_ibu_KD }}</td>
                        </tr>
                        <tr>
                            <th>Sertifikat</th>
                            <td>{{ $data->sertif }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($data->status === 0)
                                <span class="badge badge-danger">Ditolak</span>
                                @elseif ($data->status === 1)
                                <span class="badge badge-warning">Menunggu Diproses</span>
                                @elseif ($data->status === 2)
                                <span class="badge badge-info">Diproses</span>
                                @elseif ($data->status === 3)
                                <span class="badge badge-success">Berhasil</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Akun</th>
                            <td>{{ $data->user->username }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection