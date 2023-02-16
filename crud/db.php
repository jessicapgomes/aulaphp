<?php

function executeQuery($query, $params = array()) {
    // Configurações de conexão com o banco de dados
    $host = 'localhost';
    $db_name = 'aulaphp';
    $username = 'root';
    $password = 'satriani';
    $dsn = "mysql:host=$host;dbname=$db_name";

    // Cria uma nova conexão PDO
    $pdo = new PDO($dsn, $username, $password);

    // Prepara a consulta SQL usando a conexão PDO
    $stmt = $pdo->prepare($query);

    // Executa a consulta SQL com os parâmetros fornecidos
    $stmt->execute($params);

    // Verifica se a consulta é de leitura (SELECT)
    if (strpos(strtolower($query), 'select') !== false) {
        // Retorna todos os resultados da consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Retorna o número de linhas afetadas pela consulta
    return $stmt->rowCount();
}

// Insere dados no banco de dados
function insert($table, $data) {
    // Monta a consulta SQL de inserção
    $fields = implode(', ', array_keys($data));
    $values = implode(', ', array_fill(0, count($data), '?'));
    $query = "INSERT INTO $table ($fields) VALUES ($values)";

    // Executa a consulta SQL com os valores passados como parâmetros
    return executeQuery($query, array_values($data));
}

// Define os dados a serem inseridos
// $data = array(
//     'nome' => 'João',
//     'email' => 'joao@example.com',
//     'telefone' => '123456789'
// );

// Insere os dados na tabela 'clientes'
// insert('clientes', $data);

function select($table, $fields = array(), $conditions = array(), $order_by = '', $limit = '') {
    // Monta a consulta SQL de seleção
    $query = "SELECT ";

    if (count($fields) > 0) {
        // Se foram especificados campos, adiciona-os à consulta
        $query .= implode(', ', $fields);
    } else {
        // Caso contrário, seleciona todos os campos
        $query .= "*";
    }

    $query .= " FROM $table";

    if (count($conditions) > 0) {
        // Se foram especificadas condições, adiciona-as à consulta
        $where = array();
        foreach ($conditions as $field => $value) {
            $where[] = "$field = ?";
        }
        $query .= " WHERE " . implode(' AND ', $where);
    }

    if ($order_by != '') {
        // Se foi especificada uma ordem, adiciona-a à consulta
        $query .= " ORDER BY $order_by";
    }

    if ($limit != '') {
        // Se foi especificado um limite, adiciona-o à consulta
        $query .= " LIMIT $limit";
    }

    // Executa a consulta SQL com os valores passados como parâmetros
    return executeQuery($query, array_values($conditions));
}

// Seleciona todos os registros da tabela 'clientes'
// $clientes = select('clientes');

// Seleciona apenas os campos 'nome' e 'email' da tabela 'clientes'
// $clientes = select('clientes', array('nome', 'email'));

// Seleciona apenas os registros da tabela 'clientes' com o campo 'idade' igual a 25
// $clientes = select('clientes', array(), array('idade' => 25));

// Seleciona apenas os registros da tabela 'clientes' com o campo 'idade' igual a 25, classificados por 'nome' em ordem crescente
// $clientes = select('clientes', array(), array('idade' => 25), 'nome ASC');

// Seleciona apenas os primeiros 10 registros da tabela 'clientes'
// $clientes = select('clientes', array(), array(), '', 10);

function deleteById($table, $id) {
    // Monta a consulta SQL de exclusão
    $query = "DELETE FROM $table WHERE id = ?";

    // Executa a consulta SQL com o valor do id passado como parâmetro
    return executeQuery($query, array($id));
}

// Exclui o registro com o id 1 da tabela 'clientes'
// deleteById('clientes', 1);

function updateById($table, $id, $data) {
    // Monta a consulta SQL de atualização
    $set = array();
    foreach ($data as $field => $value) {
        $set[] = "$field = ?";
    }
    $query = "UPDATE $table SET " . implode(', ', $set) . " WHERE id = ?";

    // Executa a consulta SQL com os valores passados como parâmetros
    $params = array_values($data);
    $params[] = $id;
    return executeQuery($query, $params);
}

// Atualiza o registro com o id 1 da tabela 'clientes'
// $updateData = array(
//     'nome' => 'João Silva',
//     'email' => 'joao.silva@gmail.com',
//     'telefone' => '9999-9999'
// );
// updateById('clientes', 1, $updateData);



?>