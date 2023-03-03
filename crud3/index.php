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

// Cria a variavel $conexao
include 'modelos/conexao.php';

// Pega a estrig que vai gerar a rota na URL
// O padrão da URL é /controle/acão/parametro1/parametro2 ....
$rota = $_SERVER['REQUEST_URI'];
$rota = explode('/',$rota);

// Verifica se um controle foi definido na URL
if ($rota[1] != '') {
    $controle = $rota[1];
}
else{
    // caso contrario, define um controle por padrão
    $controle = 'cidades';
}

// Inclui o arquivo de controle selecionado
include 'controles/'.$controle.'.php';

// Verifica se uma ação foi definida na URL
if (isset($rota[2])) {
    $acao = $rota[2];
}
else{
    // Caso contrário, define uma ação padrão
    $acao = 'index';
}

// Executar a função com o nome da ação selecionada


switch (count($rota)) {
    case 3:
        $data = $acao($conexao);
        break;
    case 4:
        $data = $acao($conexao,$rota[3]);
        break;
    case 5:
        $data = $acao($conexao,$rota[3],$rota[4]);
        break;
    
    default:
        $data = $acao($conexao);
        break;
}

// Separa os dados do array que retorna da função
foreach ($data as $k => $v) {
    $$k = $v;
}

// Incluí a view principal, onde as páginas internas serão carregadas
include 'views/master.php';

?>
<pre><?php //print_r($_SERVER)?></pre>


