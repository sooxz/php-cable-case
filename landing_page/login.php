<?php
session_start();

require_once "src/model/Admin.php";
require_once "src/const.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['usuario'];
    $pass = $_POST['senha'];

    $adm = new Admin(user: $user, pass: $pass);

    if ($adm->login()["pass"]) {
        $_SESSION["adm"] = $adm->login()["adm"];
        header("location: ListaLead.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Administrativo | CableCase</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f6f6f6;
      color: #333;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      width: 100%;
      padding: 20px 40px;
      background-color: #fff;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .admin-link {
      text-decoration: none;
      color: #ff6600;
      font-weight: bold;
      font-size: 15px;
    }

    .login-container {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
    }

    .form-container {
      background-color: #fff;
      padding: 35px 30px;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(0,0,0,0.08);
      width: 100%;
      max-width: 400px;
      border-top: 6px solid #ff6600;
      border-right: 6px solid #000;
      position: relative;
    }

    .form-container::before {
      content: "";
      position: absolute;
      top: -15px;
      left: -15px;
      width: 30px;
      height: 30px;
      background-color: #ff6600;
      border-radius: 50%;
      box-shadow: 0 0 10px rgba(255,102,0,0.5);
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #111;
    }

    .form-group {
      margin-bottom: 18px;
    }

    label {
      font-weight: 600;
      display: block;
      margin-bottom: 6px;
      font-size: 15px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1.8px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
      background-color: #fefefe;
    }

    input[type="submit"] {
      width: 100%;
      padding: 14px;
      background-color: #000;
      color: #ff6600;
      border: 2px solid #ff6600;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
      margin-top: 10px;
    }

    input[type="submit"]:hover {
      background-color: #ff6600;
      color: #fff;
    }

    .linha-externa {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
      gap: 12px;
    }

    .volta-inutil {
      font-weight: bold;
      color: #ff6600;
      text-decoration: none;
      font-size: 15px;
      transition: color 0.3s ease;
    }

    .volta-inutil:hover {
      color: #cc5200;
    }

    .separador {
      color: #aaa;
    }

    footer {
      background-color: #111;
      color: #aaa;
      text-align: center;
      padding: 20px;
      font-size: 14px;
    }

    footer span {
      color: #ffa500;
    }
  </style>
</head>
<body>

  <header>
    <a class="admin-link" href="index.php">Voltar ao Início</a>
  </header>

  <div class="login-container">
    <div class="form-container">
      <h2>Acesso Administrativo</h2>
      <form action="#" method="post">
        <div class="form-group">
          <label for="usuario">Usuário:</label>
          <input type="text" name="usuario" id="usuario" required>
        </div>
        <div class="form-group">
          <label for="senha">Senha:</label>
          <input type="password" name="senha" id="senha" required>
        </div>
        <input type="submit" value="Entrar">
      </form>

      <div class="linha-externa">
        <a href="#" class="volta-inutil">Esqueci a senha</a>
        <span class="separador">|</span>
        <a href="index.php" class="volta-inutil">Voltar</a>
      </div>
    </div>
  </div>

  <footer>
    Desenvolvido por <span>Equipe CableCase</span>
  </footer>

</body>
</html>
