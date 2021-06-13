@extends('pengguna.templates.default')
@section('content')
    <style>
        input.invalid {
            background-color: #ffdddd;
        }

        .tab {
            display: none;
        }

        .tombol {
            background-color: #4e73df;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-family-sans-serif: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            ;
            cursor: pointer;
            border-radius: 7px;
        }

        .tombol:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #4e73df;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        .step.finish {
            background-color: #4e73df;
        }

    </style>

    <body>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br />
                @endforeach
            </div>
        @endif

        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-primary ">ARTIKEL</h4>
                </div>
                <div class="card-body">
                    <form action="/artikel/proses" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div style="text-align:center;margin-top:20px;margin-bottom:20px;">
                            <span class="step"></span>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="judul" class=" form-control-label">Judul </label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" name="judul"></input>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="keterangan" class=" form-control-label">Deskripsi</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea class="form-control" name="keterangan"></textarea>
                            </div>
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Upload Gambar</legend>
                            </div>
                            <div class="row col-sm-2 pt-0">
                                <input type="file" name="file" class="custom-file-inpuit" id="file">
                            </div>
                        </fieldset>

                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>



        </div>
        </div>
        </div>
    </body>

@endsection
