@extends('pengguna.templates.default')
@section('content')
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <div class="content">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title">Artikel</h4>

                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="lineChartExample"></canvas>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title">Artikel</h4>

                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title">Artikel</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="barChartSimpleGradientsNumbers"></canvas>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
                        </div>
                    </div>
                </div>
            </div>
        </div>

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


            <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card  card-tasks">
                    <div class="card-header ">
                        <h5 class="card-category"><b>FEEDBACK</b></h5>
                        <h4 class="card-title"></h4>
                    </div>
@foreach ($feedback as $item)
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
                        <h5 class="card-category">All Persons List</h5>
                        <h4 class="card-title"> Employees Stats</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Country
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th class="text-right">
                                        Salary
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Dakota Rice
                                        </td>
                                        <td>
                                            Niger
                                        </td>
                                        <td>
                                            Oud-Turnhout
                                        </td>
                                        <td class="text-right">
                                            $36,738
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Minerva Hooper
                                        </td>
                                        <td>
                                            Curaçao
                                        </td>
                                        <td>
                                            Sinaai-Waas
                                        </td>
                                        <td class="text-right">
                                            $23,789
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Sage Rodriguez
                                        </td>
                                        <td>
                                            Netherlands
                                        </td>
                                        <td>
                                            Baileux
                                        </td>
                                        <td class="text-right">
                                            $56,142
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Doris Greene
                                        </td>
                                        <td>
                                            Malawi
                                        </td>
                                        <td>
                                            Feldkirchen in Kärnten
                                        </td>
                                        <td class="text-right">
                                            $63,542
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Mason Porter
                                        </td>
                                        <td>
                                            Chile
                                        </td>
                                        <td>
                                            Gloucester
                                        </td>
                                        <td class="text-right">
                                            $78,615
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>
    </body>
    </html>

@endsection
