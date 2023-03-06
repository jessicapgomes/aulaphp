<?php

// Start the session
session_start();

// Mensagem de sistema
if (isset($_SESSION['alert'])) {
    $alert = $_SESSION['alert'];
    if (isset($_SESSION['color'])) {
        $color = $_SESSION['color'];
    }
    else {
        $color = 'alert-success';
    }
    unset($_SESSION['alert']);
    unset($_SESSION['color']);
}

// Extrai os comandos da URL
if (isset($_SERVER['PATH_INFO'])) 
{
    $uri = $_SERVER['PATH_INFO'];
    $uri = explode('/',$uri);
    unset($uri[0]);
    $count_route = count($uri);
}
else {
    $count_route = 0;
}
$controle = (isset($uri[1])) ? $uri[1]: 'cidades';
$acao = (isset($uri[2])) ? $uri[2]: 'index';
$p1 = (isset($uri[3])) ? $uri[3]: '';
$p2 = (isset($uri[4])) ? $uri[4]: '';

// gerar objeto de conexão com o banco
include 'modelos/conexao.php';

// Carrega o controle selecionado
include 'controles/'.$controle.'.php';

// Definir as rotas
switch ($count_route) {
    case 3:
        $return = $acao($conexao,$p1);
        break;

    case 4:
        $return = $acao($conexao,$p1,$p2);
        break;
    
    default:
        $return = $acao($conexao);
        break;
}

foreach ($return as $k => $v) {
    $$k = $v;
}

include 'views/master.php';

?>

<pre><?php //print_r($cidades)?></pre>