<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tutorial MySQL</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style>
            body {
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Tutorial MySQL</h1>

            <ol>
                <li>Baixar o MySQL em https://dev.mysql.com/downloads/windows/installer/8.0.html</li>
                <li>Baixar o gerenciador de banco https://dbeaver.io/</li>
                <li>Conectar o DBeaver ao MySQL</li>
                <li>Criar uma nova base de dados (Databases)</li>
                <li>Documentação da linguagem SQL</li>
                <li>Criar uma tabela (https://www.w3schools.com/sql/sql_create_table.asp)</li>
                <li>pincipais tipos de campos: (https://blog.tiagopassos.com/2010/04/07/principais-tipos-de-campos-no-mysql/)</li>
                <ul>
                    <li>int: números inteiros</li>
                    <li>decimal: números com vírgual</li>
                    <li>date: para salvar datas (2023-02-01) ano / mês / dia</li>
                    <li>varchar: para pequenos campos de texto, como nomes, titulos e etc. (255 caracteres)</li>
                    <li>text: para textos mais longos, como o corpo de texto de um blog.</li>
                </ul>
            </ol>

            <hr>

            <ol>
                <li><p>Criar 3 tabelas no banco como o exemplo a seguir</p>
                    <pre>
                        CREATE TABLE clientes (
                            id int AUTO_INCREMENT,
                            nome varchar(255),
                            email varchar(255),
                            idade int,
                            cidade varchar(255),
                            criado date,
                            PRIMARY KEY (id)
                        );
                    </pre>
                </li>
                <li>Usar chave primária (PRIMARY KEY) e auto incremento (AUTO_INCREMENT)</li>
                <li>Popular as tabelas usando linguagem SQL (https://www.w3schools.com/sql/sql_insert.asp)</li>
                <li>Editar linhas da tabela usando linguagem SQL (https://www.w3schools.com/sql/sql_update.asp)</li>
                <li>Excluir linhas da tabela usando linguagem SQL (https://www.w3schools.com/sql/sql_delete.asp)</li>
                <li>Selecionar dados da tabela usando linguagem SQL (https://www.w3schools.com/sql/sql_select.asp)</li>
            </ol>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>