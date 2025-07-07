<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta http-equiv="refresh" content="2; url=index.php">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Encerrando sessão | CableCase</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logout-box {
            background-color: #fff;
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            border-left: 6px solid #ff6600;
            border-bottom: 4px solid #ff6600;
            text-align: center;
            max-width: 420px;
            width: 90%;
            animation: fadeIn 0.6s ease-in-out;
        }

        .logout-box h1 {
            font-size: 26px;
            color: #ff6600;
            margin-bottom: 12px;
        }

        .logout-box p {
            font-size: 17px;
            color: #444;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            .logout-box {
                padding: 30px 25px;
            }

            .logout-box h1 {
                font-size: 22px;
            }

            .logout-box p {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="logout-box">
        <h1>Encerrando sessão...</h1>
        <p>Você será redirecionado em instantes.</p>
    </div>
</body>
</html>
