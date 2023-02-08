<?php

// Cadastrando as coisas na tabela
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=aulaphp', 'root', 'satriani');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
        $nome = $_POST['name'];
        $email = $_POST['email'];
        $idade = ($_POST['idade'] != '') ? $_POST['idade'] : 0;
        $cidade = $_POST['cidade'];
        $criado = date('Y-m-d');
     
        $sql = "INSERT INTO clientes (nome, email, idade, cidade, criado) VALUES (:nome, :email, :idade, :cidade, :criado)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':criado', $criado);
        $stmt->execute();
     
        echo "Registro inserido com sucesso!";
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
    $pdo = null;
}

// Consultando os dados da tabela
try {
    $pdo = new PDO('mysql:host=localhost;dbname=aulaphp', 'root', 'satriani');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $sql = "SELECT * FROM clientes";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

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

    <title>CRUD com Php e MySQL</title>
  </head>
  <body>
    <div class="container">
        <h1>CRUD com Php e MySQL</h1>

        <form method="post">
            <div class="form-group">
                <label for="form-name">Nome</label>
                <input type="text" class="form-control" name="name" placeholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label for="form-email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Digite seu email">
            </div>
            <div class="form-group">
                <label for="form-telefone">Idade</label>
                <input type="number" class="form-control" name="idade" placeholder="Digite a idade">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" name="cidade" placeholder="Digite a cidade">
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
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $r): ?>
                <tr>
                    <td><?=$r['nome']?></td>
                    <td><?=$r['email']?></td>
                    <td><?=$r['idade']?></td>
                    <td><?=$r['cidade']?></td>
                    <td><?=$r['criado']?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <pre>
            <?php //print_r($result) ?>
        </pre>

    </div>
        
  </body>
</html>