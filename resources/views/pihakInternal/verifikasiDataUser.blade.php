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
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Keluhan</th>
                                            <th>Alamat SATPAS</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $item)
                                        <tr>
                                            <td></td>
                                            <td>{{ $item -> nama }}</td>
                                            <td>{{ $item -> keluhan }}</td>
                                            <td>{{ $item -> alamat_satpas }}</td>
                                            <td>{{ $item -> Tanggal }}</td>
                                            <td><a href ="">Verifikasi</a></td>
                                        </tr>
                                        
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            @endsection

                            </body>

</html>
