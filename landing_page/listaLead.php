<?php

require_once "src/model/Admin.php";
require_once "src/database/Database.php";
require_once "src/model/Lead.php";
require_once "src/const.php";

session_start();

//var_dump( $_SESSION["adm"] );

//Lógica para não permitir acesso à esta página
//sem ter uma sessão iniciada.
if( !isset( $_SESSION["adm"] ) ) {
   header("location: index.php");
}

$registrosPorPagina = 3;
$paginaAtual = ( isset($_GET["p"]) ) ? $_GET["p"] : 1;
$offset = ($paginaAtual - 1 ) * $registrosPorPagina;

//Criando instância da classe Database
$database = new Database();

//Criando query para cortar registros
$sql = "SELECT COUNT(*) as contagem FROM leads";

//Variável que armazena o número total de registros
$totalRegistros = $database->select($sql);

//Variável que armazena o número de páginas
$totalPaginas = ceil( $totalRegistros [0]->contagem / $registrosPorPagina );


//Criando query que vai pegar o intervalo de registros por página
$sql = "SELECT * FROM leads LIMIT $offset, $registrosPorPagina";

$listaLeadBd = $database->select($sql);

//var_dump( $listaLead );

$listaLead = [];

//Convertendo os dados do array para
//objetos da classe Lead
foreach($listaLeadBd as $lead) {
    //Criando objeto vazio
    $newLead = new Lead();
    
    //Preenchendo seus atributos por meio dos setters
    $newLead->setId( $lead->id );
    $newLead->setNome( $lead->nome );
    $newLead->setEmail( $lead->email );
    $newLead->setTelefone( $lead->telefone );
    
    //Jogando o objeto completo para a lista de lead
    array_push($listaLead, $newLead);
}

//var_dump( $listaLead );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TITLE_2 ?></title>

    <style>
       body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f6f6f6;
        color: #333;
        padding: 40px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
      }

      /* Botão Sair */
      a[href="logout.php"] {
        align-self: flex-end;
        margin-bottom: 20px;
        text-decoration: none;
        color: #ff6600;
        font-weight: bold;
        font-size: 16px;
        transition: color 0.3s ease;
      }

      a[href="logout.php"]:hover {
        color: #cc5200;
      }

      /* Título */
      h1 {
        font-size: 30px;
        margin-bottom: 20px;
        color: #ff6600;
        letter-spacing: 1px;
      }

      /* Container da tabela */
      #div1 {
        width: 100%;
        max-width: 1000px;
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.06);
      }

      /* Tabela */
      table {
        width: 100%;
        border-collapse: collapse;
        font-size: 15px;
      }

      thead {
        background-color: #ff6600;
        color: white;
      }

      thead th {
        padding: 12px;
        text-align: center;
      }

      tbody td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #eee;
      }

      tbody tr:hover {
        background-color: #fff3e0;
      }

      /* Ícones de ação */
      tbody td a {
        font-size: 18px;
        color: #ff6600;
        text-decoration: none;
        transition: 0.3s;
      }

      tbody td a:hover {
        color: #cc5200;
      }

      /* Formulário de edição */
#editar {
  background-color: #fff;
  border-radius: 16px;
  padding: 40px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  max-width: 500px;
  margin: 0 auto 40px auto;
  width: 100%;
}

#editar h4 {
  font-size: 24px;
  color: #ff6600;
  margin-bottom: 25px;
  text-align: center;
  font-weight: bold;
}

#editar input[type="number"],
#editar input[type="text"] {
  width: 100%;
  padding: 14px;
  border: 1.5px solid #ccc;
  border-radius: 8px;
  margin-bottom: 20px;
  font-size: 16px;
  transition: border-color 0.3s;
}

#editar input[type="number"]:focus,
#editar input[type="text"]:focus {
  border-color: #ff6600;
  outline: none;
}

#editar input[type="submit"],
#editar button {
  padding: 12px 24px;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  margin-right: 10px;
  transition: all 0.3s ease-in-out;
}

#editar input[type="submit"] {
  background-color: #000;
  color: #ff6600;
  border: 2px solid #ff6600;
}

#editar input[type="submit"]:hover {
  background-color: #ff6600;
  color: #fff;
}

#editar button {
  background-color: #f9f9f9;
  color: #333;
  border: 1px solid #ccc;
}

#editar button:hover {
  background-color: #f0f0f0;
}

/* Responsivo */
@media (max-width: 768px) {
  #div1,
  #editar {
    width: 100%;
    padding: 20px;
  }

  table {
    font-size: 14px;
  }

  thead th,
  tbody td {
    padding: 10px 8px;
  }
}

#page-select {
  font-size: 16pt;
  font-weight: bold;
  color: #333;
}

a {
  text-decoration: none;
  color: inherit;
}

#paginas {
  color: #ff6600;
  font-weight: bold;
}


    </style>

</head>
<body>
    <a href="logout.php"> Sair </a>

    <h1>Lista de Leads:</h1>
<div id="div1">
    <table>
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>TELEFONE</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach($listaLead as $lead) : ?>
                <tr>
                    <td> <?= $lead->getId() ?> </td>
                    <td> <?= $lead->getNome() ?> </td>
                    <td> <?= $lead->getEmail() ?> </td>
                    <td> <?= $lead->getTelefone() ?> </td>
                    <td>
                        <a onclick="excluirLead(<?= $lead->getId() ?>, '<?= $lead->getNome() ?>')"> 🗑 </a>
                    </td>
                    <td>
                        <a onclick="editarLead(
                                        <?= $lead->getId() ?>,
                                        '<?= $lead->getNome() ?>',
                                        '<?= $lead->getEmail() ?>',
                                        '<?= $lead->getTelefone() ?>'
                                    )"> ✎ </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if( $paginaAtual > 1 )  : ?>
       <a class="paginas" href="listaLead.php?p=<?= $paginaAtual -1?>"> < </a>
    <?php endif; ?>

<?php 
    for($p = 1; $p <= $totalPaginas; $p++) {
      if($p == $paginaAtual) {
          echo "<a class='paginas' href='listaLead.php?p=$p'id='page-select'> $p </a>";
      } else {
          echo "<a class='paginas' href='listaLead.php?p=$p'> $p </a>";
      }
    }
?>

    <div id="editar">
      <hr>
        <h4>Editar lead</h4>
        <form action="src/database/editar_lead.php" method="get">
            <input type="hidden" name="id" id="id" readonly>
            <input type="text" name="nome" id="nome" placeholder="Nome" required>
            <input type="text" name="email" id="email" placeholder="Email" required>
            <input type="text" name="telefone" id="telefone" placeholder="Telefone" required>
            <br><br>
            <input type="submit" value="Salvar edição">
            <button onclick="cancelar()">Cancelar</button>
        </form>
    </div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
        

<?php if( $paginaAtual < $totalPaginas ) : ?>
  <a class="paginas" href="listaLead.php?p=<?= $paginaAtual+1  ?>"> > </a>
<?php endif; ?>

    <script>
        var boxEditar = document.getElementById("editar");
        boxEditar.style.display = "none";

        function editarLead(id, nome, email, telefone) {
          document.getElementById("id").value = id
          document.getElementById("nome").value = nome
          document.getElementById("email").value = email
          document.getElementById("telefone").value = telefone
          boxEditar.style.display = "block";
        }

        function excluirLead(id, nome) {
          if( confirm("Excluir "+nome+"?") ) {
            window.location.href="src/database/excluir_lead.php?id="+id
          } 
        }

        $(document).ready(function(){
          $("#telefone").mask("(00) 00000-0000")
        })
    </script>

</body>
</html>