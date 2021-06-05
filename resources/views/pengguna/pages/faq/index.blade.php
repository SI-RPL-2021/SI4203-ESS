@extends('pengguna.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>FAQ</h2>
        </div>
        <br>
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <a href="{{ route('faq.create') }}" class="btn btn-sm btn-primary">Buat FAQ</a>
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
        <th>Pertanyaan</th>
        <th>Jawaban</th>
        <th width="250px">Action</th>
    </tr>
    @foreach ($faq as $faq)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $faq->pertanyaan }}</td>
        <td>{{ $faq->jawaban }}</td>
        <td>
            <form action="{{ route('faq.destroy',$faq->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('faq.edit',$faq->id) }}">Edit</a>

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