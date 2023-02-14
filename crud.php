<?php
// Cria o objeto do banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=aulaphp', 'root', 'satriani');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Cria a variavel alert
$alert = '';

// Cadastrando as coisas na tabela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        $nome = $_POST['name'];
        $id = (isset($_POST['clienteid'])) ? $_POST['clienteid'] : '';
        $email = $_POST['email'];
        $idade = ($_POST['idade'] != '') ? $_POST['idade'] : 0;
        $cidade = $_POST['cidade'];
        $criado = date('Y-m-d');

        if ($id != '') {
            $sql = "UPDATE clientes SET nome = :nome, email = :email, idade = :idade, cidade = :cidade WHERE id = :id";
        }
        else {
            $sql = "INSERT INTO clientes (nome, email, idade, cidade, criado) VALUES (:nome, :email, :idade, :cidade, :criado)";
        }
     
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':cidade', $cidade);
        if ($id != '') {
            $stmt->bindParam(':id', $id);
            $alert = "registro atualizado com sucesso";
        }
        else {
            $stmt->bindParam(':criado', $criado);
            $alert = "Registro inserido com sucesso!";
        }
        $stmt->execute();

    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

// Carrega dados de edição
if (isset($_GET['edit']) and $_SERVER['REQUEST_METHOD'] != 'POST'){
    
    try {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $_GET['edit']);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

// Excluir um cliente do banco de dados
if (isset($_GET['delete']) and $_SERVER['REQUEST_METHOD'] != 'POST'){

    try {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $_GET['delete']);
        $stmt->execute();
        $cli = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
    
    try {
        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $_GET['delete']);
        $stmt->execute();
        $alert = $cli['nome']." foi excluído";

    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

// Consultando os dados da tabela
try {
 
    $sql = "SELECT * FROM clientes";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}


$pdo = null;

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
        <h1>CRUD com Php e MySQL</h1>

        <?php if($alert != ''): ?>
            <div class="alert alert-success" role="alert"><?=$alert?></div>
        <?php endif ?>

        <form method="post">
            <div class="form-group">
                <label for="form-name">Nome</label>
                <input type="text" class="form-control" name="name" placeholder="Digite seu nome" 
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
            <input type="hidden" name="clienteid" value="<?= (isset($cliente['id'])) ? $cliente['id'] : ''?>">
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $r): ?>
                <tr>
                    <td><?=$r['nome']?></td>
                    <td><?=$r['email']?></td>
                    <td><?=$r['idade']?></td>
                    <td><?=$r['cidade']?></td>
                    <td><?=date('d/m/y',strtotime($r['criado']))?></td>
                    <td>
                        <a href="/crud.php/?edit=<?=$r['id']?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a href="/crud.php/?delete=<?=$r['id']?>">
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
    </div>
        
  </body>
</html>