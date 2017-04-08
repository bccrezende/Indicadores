<?php

require_once 'config.php';
require_once DBAPI;

$db = open_database();

if (!empty($_POST) AND ( empty($_POST['login']) OR empty($_POST['password']))) {
    echo "<script>alert('Dados em branco!');location.href=\"index.php\";</script>";
}

$usuario = ($_POST['login']);
$senha = ($_POST['password']);

    
$sql = "SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE (`usuario` = '" . $usuario . "') AND (`senha` = '" . sha1($senha) . "') AND (`ativo` = 1) LIMIT 1";
$query = $db->query($sql);


if ($query->num_rows > 0) {
      
    
    $resultado = mysqli_fetch_array($query);
    
    // Se a sessão não existir, inicia uma
    if (!isset($_SESSION))
        session_start();
    
    // Salva os dados encontrados na sessão
    $_SESSION['UsuarioID'] = $resultado['id'];
    $_SESSION['UsuarioNome'] = $resultado['nome'];
    $_SESSION['UsuarioNivel'] = $resultado['nivel'];
    
    $nivel = ($_SESSION['UsuarioNivel']);
    
    if ($nivel == '0'){
        header("Location: dashboard.php");
        exit;
    }
    if ($nivel == '1'){
        header("Location: comercial.php");
        exit;
    }
    if ($nivel == '2'){
        header("Location: qualidade.php");
        exit;
    }
    
    // Redireciona o visitante
    
    
}else {
    echo"<script>alert('Login inválido!');location.href=\"index.php\";</script>";
}

