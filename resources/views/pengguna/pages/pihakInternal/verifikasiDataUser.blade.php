@extends('pengguna.templates.default')
@section('content')
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @section('title')
    @section('content')
        </header>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data User</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No Regist</th>
                                            <th>Nama</th>
                                            <th>Keluhan</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items1 as $item)
                                        <tr>
                                            <td>{{ $item->no_regis }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jenis_pelayanan }}</td>
                                            <td>{{ $item->created_at->formatLocalized('%d %B %Y') }}</td>
                                            <td><button class="btn btn-primary">Verifikasi</button></td>
                                        </tr>
                                        @endforeach
                                        @foreach ($items2 as $item)
                                        <tr>
                                            <td>{{ $item->no_regis}}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item-> perubahan}} , {{ $item-> perpanjangan}}</td>
                                            <td>{{ $item->created_at->formatLocalized('%d %B %Y') }}</td>
                                            <td><button class="btn btn-primary">Verifikasi</button></td>
                                        </tr>
                                        @endforeach
                                        @foreach ($items3 as $item)
                                        <tr>
                                            <td>{{$item->no_regis }}</td>
                                            <td>{{ $item->nm_lngkp }}</td>
                                            <td>{{ $item->jenis_pelayanan }}</td>
                                            <td>{{ $item->created_at->formatLocalized('%d %B %Y') }}</td>
                                            <td><button class="btn btn-primary">Verifikasi</button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endsection

                            </body>

</html>
