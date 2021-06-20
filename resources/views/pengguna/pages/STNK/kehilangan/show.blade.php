@extends('pengguna.templates.default')
@section('content')
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
                    <h6 class="m-0 font-weight-bold text-primary">Detail {{ $data->no_regis }}</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Tanggal Hilang</th>
                            <td>{{ $data->tanggal_hilang->translatedFormat('l, d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $data->keterangan }}</td>
                        </tr>
                        <tr>
                            <th>File</th>
                            <td>
                                <a href="{{ route('kehilangan-stnk.download', $data->id) }}" class="btn btn-sm btn-success"><i class="fas fa-download"></i>Download</a>
                            </td>
                        </tr>
                        <tr>
                            <th>No. Registrasi</th>
                            <td>{{ $data->stnk->no_regis }}</td>
                        </tr>
                        <tr>
                            <th>No. STNk</th>
                            <td>{{ $data->stnk->no_stnk }}</td>
                        </tr>
                        <tr>
                            <th>Merk Kendaraan</th>
                            <td>{{ $data->stnk->merk }}</td>
                        </tr>
                        <tr>
                            <th>Type Kendaraan</th>
                            <td>{{ $data->stnk->type }}</td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td>{{ $data->stnk->jenis }}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>{{ $data->stnk->model }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Pembuatan</th>
                            <td>{{ $data->stnk->thn_pembuatan }}</td>
                        </tr>
                        <tr>
                            <th>Silinder</th>
                            <td>{{ $data->stnk->silinder }}</td>
                        </tr>
                        <tr>
                            <th>No. Rangka</th>
                            <td>{{ $data->stnk->nmr_rangka }}</td>
                        </tr>
                        <tr>
                            <th>No. Mesin</th>
                            <td>{{ $data->stnk->nmr_mesin }}</td>
                        </tr>
                        <tr>
                            <th>Warna Kendaraan</th>
                            <td>{{ $data->stnk->warna_kendaraan }}</td>
                        </tr>
                        <tr>
                            <th>Bahan Bakar</th>
                            <td>{{ $data->stnk->bahan_bakar }}</td>
                        </tr>
                        <tr>
                            <th>Warna TNKB</th>
                            <td>{{ $data->stnk->warna_tnkb }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Registrasi</th>
                            <td>{{ $data->stnk->thn_registrasi }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Urut Pendaftaran</th>
                            <td>{{ $data->stnk->nmr_urut }}</td>
                        </tr>
                        <tr>
                            <th>Nomr Faktur</th>
                            <td>{{ $data->stnk->nmr_faktur }}</td>
                        </tr>
                        <tr>
                            <th>APM</th>
                            <td>{{ $data->stnk->apm }}</td>
                        </tr>
                        <tr>
                            <th>Nomor PIB</th>
                            <td>{{ $data->stnk->nmr_pib }}</td>
                        </tr>
                        <tr>
                            <th>Nomor SUT</th>
                            <td>{{ $data->stnk->nmr_sut }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Tanda Pendaftaran</th>
                            <td>{{ $data->stnk->nmr_tanda_pendaftaran }}</td>
                        </tr>
                        <tr>
                            <th>Kepemilikan</th>
                            <td>{{ $data->stnk->kepemilikan }}</td>
                        </tr>
                        <tr>
                            <th>Nama Pemilik</th>
                            <td>{{ $data->stnk->nama_pemilik }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Pemilik</th>
                            <td>{{ $data->stnk->alamat_pemilik }}</td>
                        </tr>
                        <tr>
                            <th>Kode POS</th>
                            <td>{{ $data->stnk->kode_pos }}</td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>{{ $data->stnk->nmr_telepon }}</td>
                        </tr>
                        <tr>
                            <th>No. KTP</th>
                            <td>{{ $data->stnk->user->nik }}</td>
                        </tr>
                        <tr>
                            <th>KITAS</th>
                            <td>{{ $data->stnk->kitas }}</td>
                        </tr>
                        <tr>
                            <th>Baru</th>
                            <td>{{ $data->stnk->baru }}</td>
                        </tr>
                        <tr>
                            <th>Perubahan</th>
                            <td>{{ $data->stnk->perubahan }}</td>
                        </tr>
                        <tr>
                            <th>Persyaratan Khusu</th>
                            <td>{{ $data->stnk->persyaratan_khusus }}</td>
                        </tr>
                        <tr>
                            <th>Masa Berlaku</th>
                            <td>
                                @if ($data->stnk->masa_berlaku !== NULL)
                                {{ $data->stnk->masa_berlaku->translatedFormat('d-m-Y') }}
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pajak Berlaku</th>
                            <td>
                                @if ($data->stnk->pajak_berlaku !== NULL)
                                {{ $data->stnk->pajak_berlaku->translatedFormat('d-m-Y') }}
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($data->status === 'GAGAL')
                                <span class="badge badge-danger">Ditolak</span>
                                @elseif ($data->status === 'MENUNGGU DIPROSES')
                                <span class="badge badge-warning">Menunggu Diproses</span>
                                @elseif ($data->status === 'PROSES')
                                <span class="badge badge-info">Diproses</span>
                                @elseif ($data->status === 'SUKSES')
                                <span class="badge badge-success">Berhasil</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Akun</th>
                            <td>{{ $data->stnk->user->username }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection