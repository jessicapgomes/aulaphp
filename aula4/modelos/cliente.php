<?php

function obterTodosClientes($conexao) {
    $query = "select clientes.id, clientes.nome, clientes.email, clientes.apresentacao, cidades.nome as cidade from clientes
    join cidades on clientes.cidade = cidades.id";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function inserirCliente($conexao, $data) {
    $campos = [];
    $binds = [];
    foreach ($data as $k => $v) {
        $$k = $v;
        $campos[] = $k;
        $binds[] = ':'.$k;
    }
    $campos = implode(',',$campos);
    $binds = implode(',',$binds);
    $query = "INSERT INTO clientes ($campos) VALUES ($binds)";
    echo $query;
    $stmt = $conexao->prepare($query);
    foreach ($data as $k => $v) {
        $stmt->bindValue(":$k", $v);
    }
    return ($stmt->execute()) ? true : false;
}

function obterClientePorId($conexao, $id) {
    $query = "SELECT * FROM clientes WHERE id = :id";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function atualizarCliente($conexao, $id, $data) {
    $campos = [];
    foreach ($data as $k => $v) {
        $$k = $v;
        $campos[] = "$k = :$k";
    }
    $campos = implode(',',$campos);

    $query = "UPDATE clientes SET $campos WHERE id = :id";
    echo $query;
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    foreach ($data as $k => $v) {
        $stmt->bindValue(':'.$k, $v);
    }
    $stmt->execute();
}

function excluirCliente($conexao, $id) {
    $query = "DELETE FROM clientes WHERE id = :id";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
}

?>