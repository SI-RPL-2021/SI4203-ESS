@extends('pengguna.templates.default')
@section('content')
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Laporan Kehilangan STNK</h6>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="no_regis">No Registrasi </label>
                        <input type="no_regis" name="no_regis" class="form-control @error('no_regis') is-invalid @enderror">
                        @error('no_regis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_regis">Silahkan Download File Berikut </label>
                        <button class="btn  btn-primary">Download</button>
                    </div>
                    <div class="form-group">
                        <button class="btn  btn-primary">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection