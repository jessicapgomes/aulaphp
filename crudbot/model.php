<?php

$host = 'mysql62-farm2.uni5.net';
$dbname = 'grupomisturafi';
$username = 'grupomisturafi';
$password = 'Satriani2';

$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);


function listarClientes($pdo) {
    $stmt = $pdo->query('SELECT * FROM clientes');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarCliente($pdo, $id) {
    $stmt = $pdo->prepare('SELECT * FROM clientes WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function adicionarCliente($pdo, $cliente) {
    foreach ($cliente as $k => $v) {
        $$k = $v;
    }
    $stmt = $pdo->prepare('INSERT INTO clientes (nome, email, cidade, apresentacao) VALUES (:nome, :email, :cidade, :apresentacao)');
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':apresentacao', $apresentacao);
    return $stmt->execute();
}

function atualizarCliente($pdo, $id, $cliente) {
    foreach ($cliente as $k => $v) {
        $$k = $v;
    }
    $stmt = $pdo->prepare('UPDATE clientes SET nome = :nome, email = :email, cidade = :cidade, apresentacao = :apresentacao WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':apresentacao', $apresentacao);
    return $stmt->execute();
}

function deletarCliente($pdo, $id) {
    $stmt = $pdo->prepare('DELETE FROM clientes WHERE id = :id');
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

?>