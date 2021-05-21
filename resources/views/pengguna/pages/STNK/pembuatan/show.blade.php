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
                            <th>No. STNk</th>
                            <td>{{ $data->no_stnk }}</td>
                        </tr>
                        <tr>
                            <th>Merk Kendaraan</th>
                            <td>{{ $data->merk }}</td>
                        </tr>
                        <tr>
                            <th>Type Kendaraan</th>
                            <td>{{ $data->type }}</td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td>{{ $data->jenis }}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>{{ $data->model }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Pembuatan</th>
                            <td>{{ $data->thn_pembuatan }}</td>
                        </tr>
                        <tr>
                            <th>Silinder</th>
                            <td>{{ $data->silinder }}</td>
                        </tr>
                        <tr>
                            <th>No. Rangka</th>
                            <td>{{ $data->nmr_rangka }}</td>
                        </tr>
                        <tr>
                            <th>No. Mesin</th>
                            <td>{{ $data->nmr_mesin }}</td>
                        </tr>
                        <tr>
                            <th>Warna Kendaraan</th>
                            <td>{{ $data->warna_kendaraan }}</td>
                        </tr>
                        <tr>
                            <th>Bahan Bakar</th>
                            <td>{{ $data->bahan_bakar }}</td>
                        </tr>
                        <tr>
                            <th>Warna TNKB</th>
                            <td>{{ $data->warna_tnkb }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Registrasi</th>
                            <td>{{ $data->thn_registrasi }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Urut Pendaftaran</th>
                            <td>{{ $data->nmr_urut }}</td>
                        </tr>
                        <tr>
                            <th>Nomr Faktur</th>
                            <td>{{ $data->nmr_faktur }}</td>
                        </tr>
                        <tr>
                            <th>APM</th>
                            <td>{{ $data->apm }}</td>
                        </tr>
                        <tr>
                            <th>Nomor PIB</th>
                            <td>{{ $data->nmr_pib }}</td>
                        </tr>
                        <tr>
                            <th>Nomor SUT</th>
                            <td>{{ $data->nmr_sut }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Tanda Pendaftaran</th>
                            <td>{{ $data->nmr_tanda_pendaftaran }}</td>
                        </tr>
                        <tr>
                            <th>Kepemilikan</th>
                            <td>{{ $data->kepemilikan }}</td>
                        </tr>
                        <tr>
                            <th>Nama Pemilik</th>
                            <td>{{ $data->nama_pemilik }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Pemilik</th>
                            <td>{{ $data->alamat_pemilik }}</td>
                        </tr>
                        <tr>
                            <th>Kode POS</th>
                            <td>{{ $data->kode_pos }}</td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>{{ $data->nmr_telepon }}</td>
                        </tr>
                        <tr>
                            <th>No. KTP</th>
                            <td>{{ $data->user->nik }}</td>
                        </tr>
                        <tr>
                            <th>KITAS</th>
                            <td>{{ $data->kitas }}</td>
                        </tr>
                        <tr>
                            <th>Baru</th>
                            <td>{{ $data->baru }}</td>
                        </tr>
                        <tr>
                            <th>Perubahan</th>
                            <td>{{ $data->perubahan }}</td>
                        </tr>
                        <tr>
                            <th>Persyaratan Khusu</th>
                            <td>{{ $data->persyaratan_khusus }}</td>
                        </tr>
                        <tr>
                            <th>Pajak Berlaku Sampai</th>
                            <td>{{ $data->pajak_berlaku->translatedFormat('l, d F Y') }}</td>
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