<pre>
 Instalando o PHP
 https:www.youtube.com/watch?v=HzIXZVctwI8



 Tipos de variáveis php

 Número
 $x = 5;

 String
 $x = "Bruno Ramos Martins";

 Booleano
 $x = true
 $x = false

 Nula
 $x = null;

 Array
 $x = array(
     'nome' => 'bruno',
     'idade' => 38,
     'sexo' => 'masculino',
     'programador' => true
 );

 Exibir valores de um array
 print_r($x);

 Exibir array formatado
 echo "<pre>";
 print_r($x);
 echo "</pre>";

 exibindo um item de um array
 echo $x['nome'];

 Percorrendo as linhas de um array
 foreach ($x as $k => $v) {
     echo $k.": ".$v."<br>";
 }

 Array bidimensional
 $x = array(
     'cliente1' => array(
         'nome' => 'bruno',
         'idade' => 38,
         'sexo' => 'masculino',
         'programador' => true
     ),
     'cliente2' => array(
         'nome' => 'marcelo',
         'idade' => 28,
         'sexo' => 'masculino',
         'programador' => true
     )
 );

 Exibindo um item de um array bidimensional
 echo $x['cliente2']['nome'];

 Montando uma tabela de um array bidimensional
 echo "<table class='table'><tr><th>Nome</th><th>Idade</th><th>Sexo</th></tr>";
 foreach ($x as $k => $v) {
     echo "<tr> <td>".$v['nome']."</th><th>".$v['idade']."</th><th>".$v['sexo']."</th> </tr>";
 }
 echo "</table>";

 </pre>