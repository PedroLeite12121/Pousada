<?php

    //inicia a sessão
    if(!isset($_SESSION)) {
        session_start();
    }

    //variaveis do banco de dados
    $servername = getenv('DB_HOST');   
    $username = getenv('DB_USER');   
    $password = getenv('DB_PASS');  
    $dbname = getenv('DB_NAME');
    //inicia o banco
    $conn = new mysqli($servername, $username, $password, $dbname);

    //verificação de problemas na conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

?>
