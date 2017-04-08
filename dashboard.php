<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Indicadores</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>


    </head>
    <body>
        <?php require_once 'config.php'; ?>
        <?php require_once DBAPI; ?>

        <?php require_once 'config.php'; ?>
        <?php require_once DBAPI; ?>

        <?php include(HEADER_TEMPLATE); ?>
        <?php $db = open_database(); ?>

        <h1>Indicadores</h1>
        <hr />  

        <?php if ($db) : ?>

            <?php
            $sql_faturamento = "SELECT * FROM `faturamento` ORDER BY id";
            $query_faturamento = $db->query($sql_faturamento);
            $n = 0;

            while ($row = mysqli_fetch_array($query_faturamento)) {
                $n = $n + 1;
                $id[$n] = $row['id'];
                $mes[$n] = $row['mes'];
                $mes[$n] = "'" . $mes[$n] . "'";
                $faturamento[$n] = $row['valor'];
            }

            $sql_proposta = "SELECT * FROM `propostas` ORDER BY id";
            $query_proposta = $db->query($sql_proposta);
            $m = 0;

            while ($row = mysqli_fetch_array($query_proposta)) {
                $m = $m + 1;
                $id_p[$m] = $row['id'];
                $mes_p[$m] = $row['mes'];
                $mes_p[$m] = "'" . $mes[$m] . "'";
                $num_proposta[$m] = $row['valor'];
            }
            ?>
        <?php else : ?>
            <div class="alert alert-danger" role="alert">
                <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
            </div>

        <?php endif; ?>


        <div id="graf_faturamento" style = "width: 550px; height: 400px; display:none; margin: 0 auto"> </div>
        <script language="JavaScript">
            $(document).ready(function () {
                var title = {
                    text: "Faturamento Mensal"
                };
                var subtitle = {
                    text: 'Referência - 2017'
                };
                var xAxis = {
                    categories: [<?php echo join($mes, ',') ?>]
                };
                var yAxis = {
                    title: {
                        text: 'Faturamento em Reais'
                    },
                    plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                };
                var tooltip = {
                    valueSuffix: ',00'
                };
                var legend = {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                };
                var series = [
                    {
                        name: 'Faturamento - 2017',
                        data: [<?php echo join($faturamento, ',') ?>]
                    }
                ];
                var json = {};
                json.title = title;
                json.subtitle = subtitle;
                json.xAxis = xAxis;
                json.yAxis = yAxis;
                json.tooltip = tooltip;
                json.legend = legend;
                json.series = series;
                $('#graf_faturamento').highcharts(json);
            });
        </script>

        <div id="graf_proposta" style="width: 550px; height: 400px; display:none; margin: 0 auto"></div>
        <script language="JavaScript">
            Highcharts.chart('graf_proposta', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Número de Propostas Comerciais'
                },
                subtitle: {
                    text: 'Propostas enviadas em 2017'
                },
                xAxis: {
                    categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Propostas por produto'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        name: 'Numero de Proposta',
                        data: [<?php echo join($num_proposta, ',') ?>]
                    }]
            });
        </script>  
      
    </body>
     <?php include(FOOTER_TEMPLATE); ?>
</html>


