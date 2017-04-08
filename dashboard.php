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
                $sql = "SELECT * FROM `faturamento` ORDER BY id";
                $query = $db->query($sql);
                $n = 0;

                while ($row = mysqli_fetch_array($query)) {
                    $n = $n + 1;
                    $id[$n] = $row['id'];
                    $mes[$n] = $row['mes'];
                    $mes[$n] = "'" . $mes[$n] . "'";
                    $faturamento[$n] = $row['valor'];

                    $dados[$n] = $row['mes'] . " " . $row['valor'];

                /*    echo " ";
                    echo $mes[$n];
                    echo " ";
                    echo $faturamento[$n];
                    echo " ";
                    echo '<br>';*/
                }
                //  var_dump($mes);
                //  var_dump ($dados);
                               
                
                //  $mes_array = strval(implode(", ", $mes)); 
                $mes_array = join($mes, ','); 
                $faturamento_array = join($faturamento, ','); 
                
            ?>
        <?php else : ?>
            <div class="alert alert-danger" role="alert">
                <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
            </div>

        <?php endif; ?>


        <div id="container" style = "width: 550px; height: 400px; margin: 0 auto"> </div>
          <script language="JavaScript">
 
             var mes_array = "<?php echo $mes_array; ?>";
             alert(mes_array);
             
             var faturamento_array = "<?php echo $faturamento_array; ?>";
             alert(faturamento_array);
             
             
              $(document).ready(function () {
                  var title = {
                      text: "Faturamentos"
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
                      valueSuffix: '\xB0C'
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
  
                  $('#container').highcharts(json);
              });
          </script>




        <?php include(FOOTER_TEMPLATE); ?>
    </body>
</html>


