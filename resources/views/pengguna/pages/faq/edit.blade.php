@extends('pengguna.templates.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit FAQ</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('faq.index') }}">Kembali</a>
            </div>
        </div>
    </div>
   
    <form action="{{ route('faq.update',$faq->id) }}" method="POST">
        @csrf
        @method('PUT')
     
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Pertanyaan :</strong>
                        <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" value="{{ $faq->pertanyaan }}">
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jawaban</strong>
                        <textarea name="jawaban" id="jawaban" cols="30" rows="5" class="form-control" >{{ $faq->jawaban }}</textarea>
                    </div>
                </div>
             
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
   
    </form>
@endsection 