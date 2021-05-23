@extends('pengguna.templates.default')
@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div id="container1"></div>
<br><br>
<div id="container"></div>
<script type="text/javascript">
    var users = <?php echo json_encode($datas) ?>;
    Highcharts.chart('container1', {
        title: {
            text: 'Data User'
        },
        subtitle: {
            text: 'E-SS'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Jumlah Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Users',
            data: users
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
    var pembuatan_sim = <?php echo json_encode($items1) ?>;
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Data Permohonan SIM E-SS'
        },
        subtitle: {
            text: 'Click the columns to view the details'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total percent Permohonan'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: "Jumlah Permohonan",
            colorByPoint: true,
            data: [{
                    name: "Pembuatan SIM",
                    y: {
                        {
                            $items1
                        }
                    },
                    drilldown: "pembuatan-sim"
                },
                {
                    name: "Kehilanagn SIM",
                    y: 10.57,
                    drilldown: "kehilangan-sim"
                },
                {
                    name: "Perpanjangan SIM",
                    y: 7.23,
                    drilldown: "perpanjangan-sim"
                }
            ]
        }],
        drilldown: {
            series: [{
                    name: "Pembuatan SIM",
                    id: "pembuatan-sim",
                    data: [
                        [
                            "Januari",
                            1.3
                        ],
                        [
                            "Februari",
                            53.02
                        ],
                        [
                            "Maret",
                            1.4
                        ],
                    ]
                },
                {
                    name: "Kehilangan SIM",
                    id: "kehilangan-sim",
                    data: [
                        [
                            "v58.0",
                            1.02
                        ],
                        [
                            "v57.0",
                            7.36
                        ],
                        [
                            "v56.0",
                            0.35
                        ],
                    ]
                },
                {
                    name: "Perpanjangan SIM",
                    id: "perpanjangan-sim",
                    data: [
                        [
                            "v11.0",
                            6.2
                        ],
                        [
                            "v10.0",
                            0.29
                        ],
                        [
                            "v9.0",
                            0.27
                        ],
                        [
                            "v8.0",
                            0.47
                        ]
                    ]
                },

            ]
        }
    });
</script>
@endsection