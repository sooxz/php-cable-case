<?php 

require_once "Database.php";

//Testando se há o envio da referência
if(isset ( $_GET["email"])){
    //Recebendo dados da requisição
    $email = $_GET["email"];

    $database = new Database();
    $sql = "SELECT * FROM leads WHERE email = '$email' ";
    $result = $database->select($sql);

    //var_dump($result);
    if( count( $result ) > 0 ) {
        echo true; 
    }
}

if(isset ( $_GET["telefone"] ) ) {
    $telefone = $_GET["telefone"];

    $database = new Database();
    $sql = "SELECT * FROM leads WHERE telefone = '$telefone' ";
    $result = $database->select($sql);

    //var_dump($result);
    if( count( $result ) > 0 ){
        echo true;
    }
}
