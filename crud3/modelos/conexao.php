<?php
$host = "mysql62-farm2.uni5.net";
$dbname = "grupomisturafi";
$user = "grupomisturafi";
$pass = "Satriani2";

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit();
}

?>