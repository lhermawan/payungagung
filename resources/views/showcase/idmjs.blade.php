<style>
        /*#container {*/
        /*    height: 400px;*/
        /*}*/

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

    </style>
<script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        {{--let data = <?php echo json_encode($idm_index)?>;--}}

        // function generateGraph(item) {
        //     let results = [];
        //     item.forEach((val) => {
        //         results.push([val.name, parseInt(val.y)])
        //     });
        //     Highcharts.setOptions({
        //         colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        //             return {
        //                 radialGradient: {
        //                     cx: 0.5,
        //                     cy: 0.3,
        //                     r: 0.7
        //                 },
        //                 stops: [
        //                     [0, color],
        //                     [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
        //                 ]
        //             };
        //         })
        //     });

// Build the chart
            Highcharts.chart('container', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                title: {
                    text: 'Indeks Desa Membangun (IDM) {{ $year }}'
                },
                subtitle: {
                    text: 'SKOR : IKS, IKE, IKL'
                },

                plotOptions: {
                    series: {
                        colorByPoint: true
                    },
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        showInLegend: true,
                        depth: 45,
                        innerSize: 70,
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.y:,.2f} / {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'SKOR',
                    shadow: 1,
                    border: 1,
                    data: [
                        ['IKS', <?= $row[35]->SKOR ?>],
                        ['IKE', <?= $row[48]->SKOR ?>],
                        ['IKL', <?= $row[52]->SKOR ?>]
                    ]
                }]
            });
        // generateGraph(data)
    </script>