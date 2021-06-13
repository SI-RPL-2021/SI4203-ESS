@extends('pengguna.templates.default')
@section('content')
<div class="row mb-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Feedback</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('feedback.index') }}">Kembali</a>
        </div>
    </div>
</div>

<form action="{{ route('feedback.update',$feedback->id) }}" method="POST">
    
    @csrf
    @method('PUT')

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kategori :</strong>
            <input type="number" name="kategori" id="kategori" class="form-control" value="{{ $feedback->kategori}}"">
            <div class=" container-fluid">
            <div class="row pl-0">
                <div class="col-md-4">
                    <ul>
                        <li>
                            <p class="text-muted">1 = Pembuatan STNK</p>
                        </li>
                        <li>
                            <p class="text-muted">2 = Kehilangan STNK</p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul>
                        <li>
                            <p class="text-muted">3 = Perpanjang Pajak</p>
                        </li>
                        <li>
                            <p class="text-muted">4 =
                                pembuatan SIM</p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul>
                        <li>
                            <p class="text-muted">5 = Kehilangan SIM</p>
                        </li>
                        <li>
                            <p class="text-muted">6 = Perpanjang SIM</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class=" col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Isi feedback</strong>
            <textarea name="feedback" id="feedback" cols="30" rows="5"
                class="form-control">{{ $feedback->feedback }}</textarea>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>

</form>
@endsection