<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Anotações</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #5c9cd4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .nota {
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 20px;
        }

        .nota p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Anotações</h1>

        <div class="nota">
            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tcc";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM usuarios";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='nota'>";
                    echo "<p>ID do Paciente: " . $row["id"] . "</p>";
                    echo "<p>Título: " . $row["titulo"] . "</p>";
                    echo "<p>Conteúdo: " . $row["conteudo"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "Nenhuma anotação encontrada.";
            }

            $conn->close();
            ?>
        </div>
        <div class="back-button">
        <a href="pacientes.php">Voltar</a>
        </div>

    </div>
</body>
</html>
