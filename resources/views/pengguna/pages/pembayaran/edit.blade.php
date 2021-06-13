@extends('pengguna.templates.default')
@section('content')
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-primary ">Edit Metode Pembayaran "{{ $item->nama }}"</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('pembayaran.update', $item->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="nama">Nama Pembayaran</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="contoh : Dana" value="{{ $item->nama ?? old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nomor">Nomor</label>
                        <input type="text" name="nomor" class="form-control @error('nomor') is-invalid @enderror" placeholder="contoh : 081919956872" value="{{ $item->nomor ?? old('nomor') }}">
                        @error('nomor')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="contoh : Ikbal" value="{{ $item->keterangan ?? old('keterangan') }}">
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group float-right">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection