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

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        label {
            margin-top: 10px;
        }
        button {
            margin-top: 20px;
        }
        body {
            padding: 30px 0 100px 0;
        }
    </style>
    <title>CRUD com Php e MySQL</title>
  </head>
  <body>
    <div class="container">
        <h1>CRUD 2 com Php e MySQL</h1>

        <?php if($alert != ''): ?>
            <div class="alert alert-success" role="alert"><?=$alert?></div>
        <?php endif ?>

        <form method="post">
            <div class="form-group">
                <label for="form-name">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Digite seu nome" 
                value="<?= (isset($cliente['nome'])) ? $cliente['nome'] : ''?>">
            </div>
            <div class="form-group">
                <label for="form-email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Digite seu email"
                value="<?= (isset($cliente['email'])) ? $cliente['email'] : ''?>">
            </div>
            <div class="form-group">
                <label for="form-telefone">Idade</label>
                <input type="number" class="form-control" name="idade" placeholder="Digite a idade"
                value="<?= (isset($cliente['idade'])) ? $cliente['idade'] : ''?>">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" name="cidade" placeholder="Digite a cidade"
                value="<?= (isset($cliente['cidade'])) ? $cliente['cidade'] : ''?>">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <br><br><br>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Criado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($clientes as $r): ?>
                <tr>
                    <td><?=$r['nome']?></td>
                    <td><?=$r['email']?></td>
                    <td><?=$r['idade']?></td>
                    <td><?=$r['cidade']?></td>
                    <td><?=date('d/m/y',strtotime($r['criado']))?></td>
                    <td>
                        <a href="/crud2.php/?delete=<?=$r['id']?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <pre><?php //print_r($cliente)?></pre>
    </div>
        
  </body>
</html>