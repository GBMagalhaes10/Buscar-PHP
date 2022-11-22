<?php

$dbHost = 'Localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName= 'iserj';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

/*comentário
if ($conexao->connect_errno){
     echo "Erro";
}else{
      echo "Fortuna Audaces Sequitur";
}
*/