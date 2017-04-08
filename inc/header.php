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


        <?php
        // A sessão precisa ser iniciada em cada página diferente
        if (!isset($_SESSION))
            session_start();

        $nivel_necessario = 2;
        if (!isset($_SESSION['UsuarioID']) OR ( $_SESSION['UsuarioNivel'] > $nivel_necessario)) {
            session_destroy();
            header("Location: index.php");
            exit;
        } else {
            $nivel = ($_SESSION['UsuarioNivel']);
        }
        ?>
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
                                <li><a href = "#">Clientes</a></li>
                                <li><a href = "#">Proposta Comercial</a></li>
                            </ul>
                        </li>
                        <li class = "dropdown" id="qualidade">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false">
                                Qualidade <span class = "caret"></span>
                            </a>
                            <ul class = "dropdown-menu">
                                <li><a href = "#">Controle de Reprovas</a></li>
                                <li><a href = "#">Garantia</a></li>
                            </ul>

                        </li>
                        <li class = "nav navbar-nav" id="sair">
                            <a href = "<?php session_destroy();echo BASEURL; ?>" role = "button" aria-haspopup = "true" aria-expanded = "false">
                                Sair <span class = "caret"></span>
                            </a>
                        </li>
                    </ul>
                </div><!--/.navbar-collapse -->
                
          
            </div>
        </nav>

        <main class = "container">