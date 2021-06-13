@extends('pengguna.templates.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Artikel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('article.index') }}">Kembali</a>
            </div>
        </div>
    </div>
   
    <form action="{{ route('article.update',$artikel->id) }}" method="POST">
        @csrf
        @method('PUT')
     
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Judul :</strong>
                        <input type="text" name="judul" id="judul" class="form-control" value="{{ $artikel->judul }}">
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Deskripsi</strong>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control" >{{ $artikel->keterangan }}</textarea>
                    </div>
                </div>

                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Upload Gambar</legend>
                    </div>
                    <div class="row col-sm-2 pt-0">
                        <input type="file" name="file" class="custom-file-inpuit" id="file" value="{{ $artikel->file }}">
                    </div>
                </fieldset>
             
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
   
    </form>
@endsection 