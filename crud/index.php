<?php

// Inicializa a variavel alert vazia
$alert = '';

// Incluí as funções de banco de dados
include 'db.php';

// Cadastra novos clientes
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $add_cliente = $_POST;
    $add_cliente['criado'] = date('Y-m-d');
    if (insert('clientes', $add_cliente)) {
        $alert = 'Cadastro efetuado';
    }
}

// Exclui um cliente
if (isset($_GET['delete']) and $_SERVER['REQUEST_METHOD'] != 'POST'){
    
    // Select para carregar o nome do cliente
    $cliente = select('clientes', array(), array('id' => $_GET['delete']));

    if (deleteById('clientes', $_GET['delete'])) {
        $alert = $cliente[0]['nome'].' foi excluído(a)';
    }
}

// Lista os clientes
$clientes = select('clientes');

include 'view.php';

?>