<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1">
        <title>Indicadores</title>
        <meta name = "description" content = "">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">

        <link rel = "stylesheet" href = "<?php echo BASEURL; ?>css/bootstrap.min.css">
        <link rel = "stylesheet" href = "<?php echo BASEURL; ?>css/header.css">
        <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">

        <script>
            
            
            
            function Mudarestado(nivel) {
                var nivel = nivel;
                alert (nivel);
                if (nivel === 0){
                    alert ('zero');
                    document.getElementById("graf_faturamento").style.display = "block";
                } 
                if (nivel === 1){
                    alert ('um');
                    document.getElementById("graf_proposta").style="display:block";
                } 
                
            }
        </script>

        <?php
        // A sessão precisa ser iniciada em cada página diferente
        if (!isset($_SESSION))
            session_start();

        $nivel_necessario = 2;
        // Verifica se não há a variável da sessão que identifica o usuário
        if (!isset($_SESSION['UsuarioID']) OR ( $_SESSION['UsuarioNivel'] > $nivel_necessario)) {
            session_destroy();
            header("Location: index.php");
            exit;
        } else {
            $nivel = ($_SESSION['UsuarioNivel']);
            echo"<script>Mudarestado(".$nivel.")</script>";
        }
        ?>
        
        <meta charset="UTF-8">
        <title>Indicadores</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
    </head>
    <body>
        <nav class = "navbar navbar-inverse navbar-fixed-top" role = "navigation">
            <div class = "container">
                <div class = "navbar-header">
                    <button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "#navbar" aria-expanded = "false" aria-controls = "navbar">
                        <span class = "sr-only">Toggle navigation</span>
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                    </button>
                    <a href = "<?php echo BASEURL; ?>index.php" class = "navbar-brand">Indicadores</a>
                </div>
                <div id = "navbar" class = "navbar-collapse collapse">
                    <ul class = "nav navbar-nav">
                        <li class = "dropdown" id="comercial">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false">
                                Comercial <span class = "caret"></span>
                            </a>
                            <ul class = "dropdown-menu">
                                <li><a href = "<?php echo BASEURL; ?>customers">Faturamento</a></li>
                                <li><a href = "<?php echo BASEURL; ?>customers/add.php">Propostas Enviadas</a></li>
                            </ul>

                        </li>
                        <li class = "dropdown" id="qualidade">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false">
                                Qualidade <span class = "caret"></span>
                            </a>
                            <ul class = "dropdown-menu">
                                <li><a href = "<?php echo BASEURL; ?>customers">Indice de Reprova</a></li>
                                <li><a href = "<?php echo BASEURL; ?>customers/add.php">Garantia</a></li>
                            </ul>

                        </li>
                    </ul>
                </div><!--/.navbar-collapse -->
                <a href = "<?php echo BASEURL; ?>/index.php" class="navbar-link">Sair</a>
            </div>
        </nav>

        <main class = "container">
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

        <div id="graf_proposta" style="min-width: 310px; height: 400px; visibility:hidden; margin: 100px auto "></div>
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
            