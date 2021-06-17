@extends('pengguna.templates.default')
@section('content')
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <div class="content">

{{-- Carousel --}}
<div class="container-fluid">
    <div class="col-lg-12 mx-auto" style="max-width: 70rem;" style="max-height: 20rem">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
          
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="slide.jpg" alt="First slide">
                        <div class="border-info carousel-caption d-none d-md-block mx-auto bg-shadow" style="max-width: 30rem;">
                            <h3>Artikel</h3>
                        </div>
                     
                </div>
             
                @foreach ($artikel as $item)
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ url('/data_file/' . $item->file) }}">
                        <div class="border-info carousel-caption d-none d-md-block mx-auto bg-shadow" style="max-width: 30rem;">
                            <h3>{{ $item->judul }}</h3>
                        </div>
                </div>
                @endforeach
            </div>
 
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
        {{-- End carousel --}}

        {{-- <div class="row">
        @foreach ($artikel as $item)
        <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title">{{ $item->judul }}</h4>

                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <img width="450px" height="320px" src="{{ url('/data_file/' . $item->file) }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">  
                            <i class="now-ui-icons arrows-1_refresh-69"></i>  {{ $item->keterangan }}
                        </div>
                    </div>
                   
                </div>
            </div>
            @endforeach
        </div>
       --}}


        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card  card-tasks">
                    <div class="card-header ">
                        <h5 class="card-category"><b>FAQ</b></h5>
                        <h4 class="card-title"></h4>
                    </div>
@foreach ($faq as $item)
                    <div class="card-body ">
                        <div class="table-full-width table-responsive"> 
                            <table class="table">
                                Q : {{ $item->pertanyaan }}
                                <br> A : {{ $item->jawaban }}
                                <hr>
                                @endforeach
                                <tbody>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-category"></h5>
                        <h4 class="card-title"></h4>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>
    </body>
    </html>

@endsection
