@extends('pengguna.templates.default')
@section('content')
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Laporan Kehilangan SIM</h6>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Lengkap </label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl" class="form-control @error('ttl') is-invalid @enderror" id="ttl">
                        @error('ttl')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan">
                        @error('pekerjaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_tinggal">Alamat Tinggal</label>
                        <input type="text" name="alamat_tinggal" class="form-control @error('alamat_tinggal') is-invalid @enderror" id="palamat_tinggal">
                        @error('alamat_tinggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_sim">No SIM</label>
                        <input type="text" name="no_sim" class="form-control @error('no_sim') is-invalid @enderror" id="no_sim">
                        @error('no_sim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_regis">No Registrasi</label>
                        <input type="text" name="no_regis" class="form-control @error('no_regis') is-invalid @enderror" id="no_regis">
                        @error('no_regis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tgl_awal">Tanggal Berlaku</label>
                            <input type="date" class="form-control @error('tgl_awal') is-invalid @enderror" id="tgl_awal" name="tgl_awal">
                            @error('tgl_awal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_akhir">Tanggal Berakhir</label>
                            <input type="date" class="form-control @error('tgl_akhir') is-invalid @enderror" id="tgl_akhir" name="tgl_akhir">
                            @error('tgl_akhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unggah_berkas">Unggah Berkas</label>
                        <input type="text" name="unggah_berkas" class="form-control @error('unggah_berkas') is-invalid @enderror">
                        @error('unggah_berkas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn btn-block btn-primary">Proses</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection