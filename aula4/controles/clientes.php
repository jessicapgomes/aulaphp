<?php

include 'modelos/cliente.php';
include 'modelos/cidade.php';

function index($conexao)
{
    $data = [
        'pagina' => 'tabelaclientes',
        'clientes' => obterTodosClientes($conexao),
    ];
    return $data;
}

function add($conexao)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (inserirCliente($conexao, $_POST)) {
            $_SESSION['alert'] = 'O cliente foi cadastrado';
            header('Location: /clientes/index');
        } else {
            $_SESSION['alert'] = 'Não foi possivel cadastrar o cliente';
            $_SESSION['color'] = 'alert-danger';
            header('Location: /clientes/add');
        }
    } else {
        $data = [
            'pagina' => 'formcliente',
            'cidades' => obterTodasCidades($conexao),
            'titulo' => 'Cadastrar Cliente',
            'botao' => 'Cadastrar',
            'acao' => '/clientes/add',
        ];
        return $data;
    }    
}

function edit($conexao,$id)
{
    $cliente = obterClientePorId($conexao, $id);
    $data = [
        'pagina' => 'formcliente',
        'cidades' => obterTodasCidades($conexao),
        'cliente' => $cliente,
        'acao' => 'update/'.$id,
        'titulo' => 'Editar Cliente',
        'botao' => 'Atualizar',
        'acao' => '/clientes/update/'.$id
    ];
    return $data;
}

function update($conexao,$id)
{
    $data = $_POST;
    atualizarCliente($conexao, $id, $data);
    $_SESSION['alert'] = 'O cliente foi atualizado';
    header('Location: /clientes/index');
}

function delete($conexao,$id)
{
    excluirCliente($conexao, $id);
    $_SESSION['alert'] = 'O cliente foi excluido';
    header('Location: /clientes/index');
}

?>