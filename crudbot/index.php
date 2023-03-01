<?php

include 'model.php';

$acao = 'criar';
$botao = 'Cadastrar';

// Verifico se existe uma ação
if (isset($_GET['acao'])) {

    // Cadastra os clientes
    if ($_GET['acao'] == 'criar') {
        adicionarCliente($pdo, $_POST);
    }

    // Exclui um cliente
    if ($_GET['acao'] == 'deletar') {
        deletarCliente($pdo, $_GET['id']);
    }

    // Carrega os dados de um cliente
    if ($_GET['acao'] == 'editar') {
        $cliente = buscarCliente($pdo, $_GET['id']);
        $acao = 'atualizar&id='.$_GET['id'];
        $botao = 'Atualizar';
    }

    // Atualiza o cliente
    if ($_GET['acao'] == 'atualizar') {
        atualizarCliente($pdo, $_GET['id'], $_POST);
    }

}

// echo '<pre>';
// print_r($cliente);
// echo '</pre>';

// lista os clientes
$clientes = listarClientes($pdo);

include 'view.php';
?>