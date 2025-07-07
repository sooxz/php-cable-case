<?php

//Importando arquivos
require_once "Database.php";

//Recebendo dados do formulário
if( isset( $_GET["id"] ) ) {
    $id = $_GET["id"];
} else {
    $id = null;
}

if( isset( $_GET["nome"] ) ) {
    $nome = $_GET["nome"];
} else {
    $nome = null;
}

if( isset( $_GET["email"] ) ) {
    $email = $_GET["email"];
} else {
    $email = null;
}

if( isset( $_GET["telefone"] ) ) {
    $telefone = $_GET["telefone"];
} else {
    $telefone = null;
}

//Instanciando classe Database
$database = new Database();

//Criando a instrução SQL para editar
$sql = "UPDATE leads SET nome = '$nome', email = '$email', telefone = '$telefone' WHERE id = $id";

//Enviando instrução para o banco de dados
//por meio da função da classe Database
$database->update($sql);

//Redirecionando para a página de listagem
header("location: /landing_page/listaLead.php");
