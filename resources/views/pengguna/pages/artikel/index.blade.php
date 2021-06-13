@extends('pengguna.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>ARTIKEL</h2>
        </div>
        <br>
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <a href="{{ route('article.create') }}" class="btn btn-sm btn-primary">Buat Artikel</a>
            </div>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Judul Artikel</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        <th width="250px">Action</th>
    </tr>
    @foreach ($artikel as $artikel)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $artikel->judul }}</td>
        <td>{{ $artikel->keterangan }}</td>
        <td><img width="150px" src="{{ url('/data_file/' . $artikel->file) }}"></td>
        <td>
            <form action="{{ route('article.destroy',$artikel->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('article.edit',$artikel->id) }}">Edit</a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{-- {!! $kesehatan->links() !!} --}}
  
@endsection