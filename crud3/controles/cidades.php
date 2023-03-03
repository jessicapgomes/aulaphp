<?php

include 'modelos/cidade.php';

function index($conexao)
{
    $data = [
        'pagina' => 'cidades',
        'cidades' => obterTodasCidades($conexao),
        'action' => '/cidades/add',
        'botao' => 'Cadastrar'
    ];
    return $data;
}

function add($conexao)
{
    $nome = $_POST['nome'];
    inserirCidade($conexao, $nome);
    $_SESSION['alert'] = 'A cidade '.$nome.' foi cadastrada';
    header('Location: /cidades/index');
}

function delete($conexao,$id)
{
    $cidade = obterCidadePorId($conexao, $id);
    excluirCidade($conexao, $id);
    $_SESSION['alert'] = 'A cidade '.$cidade['nome'].' foi excluída';
    header('Location: /cidades/index');
}

function edit($conexao,$id)
{
    $cidade = obterCidadePorId($conexao, $id);
    $data = [
        'pagina' => 'cidades',
        'cidades' => obterTodasCidades($conexao),
        'cidade' => $cidade,
        'action' => '/cidades/update/'.$id,
        'botao' => 'Atualizar'
    ];
    return $data;
}

function update($conexao,$id)
{
    $nome = $_POST['nome'];
    atualizarCidade($conexao, $id, $nome);
    $_SESSION['alert'] = 'A cidade '.$nome.' foi atualizada';
    header('Location: /cidades/index');
}


?>