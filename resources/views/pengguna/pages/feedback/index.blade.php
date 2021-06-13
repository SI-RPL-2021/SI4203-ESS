@extends('pengguna.templates.default')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>FEEDBACK</h2>
        </div>
        <br>
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <a href="{{ route('feedback.create') }}" class="btn btn-sm btn-primary">Submit Feedback</a>
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
        <th>ID Kategori</th>
        <th>Kategori</th>
        <th>Isi Feedback</th>
        <th width="250px">Action</th>
    </tr>
    @foreach ($feedback as $feedback)
    
    @if (auth()->user()->name === "Admin STNK" && ($feedback->kategori == '1' || $feedback->kategori == '2' ||
    $feedback->kategori == '3'))
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $feedback->kategori }}</td>
        <td>
            @switch($feedback->kategori)
            @case('1')
            <p>PEMBUATAN STNK</p>
            @break
            @case('2')
            <p>KEHILANGAN STNK</p>
            @break
            @case('3')
            <p>PERPANJANG PAJAK</p>
            @break
            @default
            <p>BUKAN FEEDBACK STNK</p>
            @endswitch
        </td>
        <td>{{ $feedback->feedback}}</td>
        <td>
            <form action="{{ route('feedback.destroy',$feedback->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('feedback.edit',$feedback->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @elseif (auth()->user()->name === "Admin SIM" && ($feedback->kategori == '4' || $feedback->kategori == '5' ||
    $feedback->kategori == '6'))
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $feedback->kategori }}</td>
        <td>
            @switch($feedback->kategori)
            @case('4')
            <p>PEMBUATAN SIM</p>
            @break
            @case('5')
            <p>KEHILANGAN SIM</p>
            @break
            @case('6')
            <p>PERPANJANG SIM</p>
            @break
            @default
            <p>BUKAN FEEDBACK SIM</p>
            @endswitch
        </td>
        <td>{{ $feedback->feedback}}</td>
        <td>
            <form action="{{ route('feedback.destroy',$feedback->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('feedback.edit',$feedback->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @elseif (auth()->user()->name != "Admin SIM" && auth()->user()->name != "Admin STNK")
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $feedback->kategori }}</td>
        <td>
            @switch($feedback->kategori)
            @case('1')
            <p>PEMBUATAN STNK</p>
            @break
            @case('2')
            <p>KEHILANGAN STNK</p>
            @break
            @case('3')
            <p>PERPANJANG PAJAK</p>
            @break
            @case('4')
            <p>PEMBUATAN SIM</p>
            @break
            @case('5')
            <p>KEHILANGAN SIM</p>
            @break
            @case('6')
            <p>PERPANJANG SIM</p>
            @break
            @default
            <p>KATEGORI TIDAK ADA</p>
            @endswitch
        </td>
        <td>{{ $feedback->feedback}}</td>
        <td>
            <form action="{{ route('feedback.destroy',$feedback->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('feedback.edit',$feedback->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endif

    @endforeach
</table>

{{-- {!! $kesehatan->links() !!} --}}

@endsection