<?php



require_once "src/model/Lead.php";
require_once "src/database/Database.php";


$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];

//criando um objeto da classe "lead" informando seus respectivos atributos

$lead = new Lead(nome: $nome, email: $email, telefone: $telefone);

echo $lead;

$sql = "INSERT INTO leads (nome, email, telefone)
 VALUES ('$nome', '$email', '$telefone')";

 $database = new Database();

 $database->insert($sql);
// pinto

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="refresh" content="2; url=index.php">
    <title>CableCase</title>

</head>
<body>
    <p>dados</p>
</body>
</html>

