<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Menu</title>
</head>
<body>
    <h1>Resultados da Busca Completa</h1>
    
    <a href="pacientes.php">Voltar para a Página de Busca</a>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tcc";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];

        $sql = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            while ($row = $result->fetch_assoc()) {
                echo "<p>ID do Paciente: " . $row["id"] . "</p>";
                echo "<p>Nome: " . $row["nome"] . "</p>";
                echo "<p>Idade: " . $row["idade"] . "</p>";
                echo "<p>Data de Nascimento: " . $row["data_nascimento"] . "</p>";
                echo "<p>Sexo: " . $row["sexo"] . "</p>";
                echo "<p>Naturalidade: " . $row["naturalidade"] . "</p>";
                echo "<p>Estado: " . $row["estado"] . "</p>";
                echo "<p>Endereço: " . $row["endereco"] . "</p>";
                echo "<p>Escolaridade: " . $row["escolaridade"] . "</p>";
                echo "<p>Escola: " . $row["escola"] . "</p>";
                echo "<p>Pai: " . $row["pai"] . "</p>";
                echo "<p>Idade do Pai: " . $row["idade_pai"] . "</p>";
                echo "<p>Mãe: " . $row["mae"] . "</p>";
                echo "<p>Idade da Mãe: " . $row["idade_mae"] . "</p>";
                echo "<p>Telefone: " . $row["telefone"] . "</p>";
            }
            echo "</table>";
        } else {
            echo "<br><br>";
            echo "Nenhum resultado encontrado.";
        }
    }

    $conn->close();
    ?>
</body>
</html>
