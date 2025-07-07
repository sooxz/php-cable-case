<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CableCase | Organizador 3 em 1</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      height: 100%;
    }

    header {
      width: 100%;
      padding: 20px 40px;
      background-color: #fff;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      position: relative;
      z-index: 4;
    }

    .admin-link {
      text-decoration: none;
      color: #ff6600;
      font-weight: bold;
      font-size: 15px;
      transition: color 0.3s ease;
    }

    .admin-link:hover {
      color: #cc5200;
    }

    .hero {
      position: relative;
      height: auto;
      overflow: hidden;
    }

    .carousel-background img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: none;
      z-index: 1;
      transition: opacity 0.8s ease-in-out;
    }

    .carousel-background img.active {
      display: block;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 2;
    }

    .container {
      position: relative;
      z-index: 3;
      display: flex;
      padding: 40px 60px;
      gap: 60px;
      justify-content: space-between;
      align-items: flex-start;
      flex-wrap: wrap;
      color: #fff;
    }

    .content {
      flex: 1;
      max-width: 600px;
    }

    .content h1 {
      font-size: 40px;
      color: #ff6600;
      margin-bottom: 20px;
    }

    .content p {
      font-size: 18px;
      margin-bottom: 20px;
      color: #eee;
    }

    .content small {
      display: block;
      margin-top: 10px;
      color: #ccc;
      font-style: italic;
    }

    .form-container {
      background-color: #fff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
      max-width: 400px;
      width: 100%;
      border-top: 6px solid #ff6600;
      border-right: 6px solid #000;
      position: relative;
      color: #333;
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
      box-shadow: 0 0 10px rgba(255, 102, 0, 0.5);
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #111;
      font-size: 24px;
    }

    .form-group {
      margin-bottom: 22px;
    }

    label {
      font-weight: 600;
      display: block;
      margin-bottom: 8px;
      font-size: 16px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"] {
      width: 100%;
      padding: 14px;
      border: 2px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 16px;
      background-color: #000;
      color: #ff6600;
      border: 2px solid #ff6600;
      border-radius: 8px;
      font-size: 17px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
      margin-top: 20px;
    }

    input[type="submit"]:hover {
      background-color: #ff6600;
      color: #fff;
    }

    footer {
      background-color: #111;
      color: #aaa;
      text-align: center;
      padding: 20px;
      font-size: 14px;
      position: relative;
      z-index: 4;
    }

    footer span {
      color: #ffa500;
    }

    @media (max-width: 900px) {
      .container {
        flex-direction: column;
        padding: 30px 20px;
        align-items: center;
      }
      .content,
      .form-container {
        max-width: 100%;
      }

      .content h1,
      .content p {
        text-align: center;
      }
    }
  </style>
</head>
<body>

  <header>
    <a class="admin-link" href="login.php">Acesso Administrativo</a>
  </header>

  <div class="hero">
    <div class="carousel-background">
      <img src="fotos/slide1.jpg" class="active" alt="Slide 1">
      <img src="fotos/slide2.jpg" alt="Slide 2">
      <img src="fotos/slide3.jpg" alt="Slide 3">
      <img src="fotos/slide4.jpg" alt="Slide 4">
    </div>

    <div class="overlay"></div>

    <div class="container">
      <div class="content">
       <h1>Conheça a <span style="color: #ff6600;">CableCase</span></h1>
      <p>
        A <strong style="color: #ff6600;">CableCase</strong> é um organizador 3 em 1 desenvolvido para trazer praticidade, proteção e estilo ao seu dia a dia.
        Com um único produto, você <strong>armazena seus cabos</strong>, <strong>protege a fonte do carregador</strong> e ainda conta com um <strong>suporte funcional para o celular</strong>.
      </p>
      <p>
        A ideia surgiu ao observar um problema recorrente: cabos embolados, fontes danificadas e a falta de um apoio prático para o celular, principalmente em ambientes de trabalho ou durante viagens.
        Pensando nisso, desenvolvemos uma solução elegante e portátil — feita em PLA resistente e com design moderno.
      </p>
      <p>
        Criada por jovens inovadores no projeto <strong style="color: #ff6600;">Junior Achievement</strong>, a CableCase representa a união entre <em>criatividade, funcionalidade</em> e <em>design inteligente</em>.
      </p>
    </div>

      <div class="form-container">
        <h2>Cadastre-se</h2>
        <form action="CapturaLead.php" method="post">
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
          </div>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>
          </div>
          <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="tel" name="telefone" id="telefone" required>
          </div>
          <input type="submit" value="Finalizar Registro">
        </form>
      </div>
    </div>
  </div>

  <footer>
    Desenvolvido por <span>Equipe CableCase</span>
  </footer>

  <script src="js/jquery.min.js"></script>  
  <script src="js/jquery.mask.min.js"></script>  

  <script>
    const slides = document.querySelectorAll(".carousel-background img");
    let index = 0;

    function showSlide(i) {
      slides.forEach((slide, idx) => {
        slide.classList.remove("active");
        if (idx === i) slide.classList.add("active");
      });
    }

    setInterval(() => {
      index = (index + 1) % slides.length;
      showSlide(index);
    }, 5000);

    $(document).ready(function(){
        $("#telefone").mask("(00) 00000-0000")
    })

    $("#email").blur(function(){
        // console.log(campo.value)
        let dados = $(this).serialize()

        $.ajax({
          url: "src/database/testar.php",
          type: 'GET',
          contentType: 'text',
          data: dados,
          success: function(dados) {
              // console.log(dados);
              if(dados == 1) {
                alert("Email já registrado!")
                $("#email").val("");
              }
          }
      })
    })

    $("#telefone").blur(function(){
        // console.log(campo.value)
        let dados = $(this).serialize()

        $.ajax({
          url: "src/database/testar.php",
          type: 'GET',
          contentType: 'text',
          data: dados,
          success: function(dados) {
              // console.log(dados);
              if(dados == 1) {
                alert("Telefone já registrado!")
                $("#telefone").val("");
              }
          }
      })
    })
  </script>

</body>
</html>
