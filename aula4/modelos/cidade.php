<?php

function obterTodasCidades($conexao) {
    $query = "SELECT id, nome FROM cidades ORDER BY nome";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obterCidadePorId($conexao, $id) {
    $query = "SELECT id, nome FROM cidades WHERE id = :id";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function inserirCidade($conexao, $nome) {
    $query = "INSERT INTO cidades (nome) VALUES (:nome)";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":nome", $nome, PDO::PARAM_STR);
    return ($stmt->execute()) ? true : false;
}

function atualizarCidade($conexao, $id, $nome) {
    $query = "UPDATE cidades SET nome = :nome WHERE id = :id";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->bindValue(":nome", $nome, PDO::PARAM_STR);
    $stmt->execute();
}

function excluirCidade($conexao, $id) {
    $query = "DELETE FROM cidades WHERE id = :id";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
}
?>