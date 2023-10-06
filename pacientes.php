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
    
    <main class="main">
        <h1>Pacientes</h1>
        <h2>Informações dos Usuários</h2>
        <form action="buscar.php" method="POST">
            <label for="nome">Digite o nome:</label>
            <input type="text" id="nome" name="nome">
            <input type="submit" value="Buscar">
        </form>
        
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tcc";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) die("Falha na conexão com o banco de dados: " . $conn->connect_error);

        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        } else {
            $id = 1; 
        }

        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p>ID do Paciente: " . $row["id"] . "</p>";
            echo "<p>Nome: " . $row["nome"] . "</p>";
            echo "<p>Idade: " . $row["idade"] . "</p>";
            echo "<p>Sexo: " . $row["sexo"] . "</p>";
            echo "<p>Naturalidade: " . $row["naturalidade"] . "</p>";
            echo "<p>Estado: " . $row["estado"] . "</p>";
            echo "<p>Escolaridade: " . $row["escolaridade"] . "</p>";
            echo "<p>Pai: " . $row["pai"] . "</p>";
            echo "<p>Mãe: " . $row["mae"] . "</p>";

            $prevId = $id - 1;
            $nextId = $id + 1;

            if ($prevId < 1) {
                $prevId = 1;
            }

            echo "<a class='btn-prev' href='pacientes.php?id=$prevId'>Anterior</a>";
            echo "<a class='btn-next' href='pacientes.php?id=$nextId' style='margin-left: 10px;'>Próximo</a>";
            echo "<a class='btn-anotacao' href='anotacao.php?id=$id' style='margin-left: 10px;'>Anotações</a>";
        } else {
            echo "Nenhum registro encontrado.";
            echo "<br><br>";
            echo "<a class='btn-teste' href='pacientes.php' style='margin-top: 10px;'>Retornar para o começo</a>";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];

            // Consulta SQL para buscar por nome
            $sql = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Nome</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nome"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "Nenhum resultado encontrado.";
            }
        }

        $conn->close();
        ?>
    </main>
    <aside class="menulateral">
        <header class="menulateral-header">
            <a href="index.html">
                <img class="logo-img" src="logo.png" alt="Logo">
            </a>
            
            <p>Dra. Priscilla Herrera Silva</p>
            <p>CRP: 122997</p>
        </header>
    
        <nav>
            <button onclick="window.location.href='pacientes.php'">
                <span>Lista de Pacientes</span>
            </button>
    
    
            <button onclick="window.location.href='financeiro.php'">
                <span>Tabela Financeira</span>
            </button>                
    
            <button onclick="window.location.href='cadastrar.html'">
                <span>Cadastro de Pacientes</span>
            </button>
    
            <button onclick="window.location.href='anotacao.php'">
                <span>Anotações das Consultas</span>
            </button>
            
            <button onclick="window.location.href='calendario.html'">
                <span>Agendar Consultas</span>
            </button>
            
            <button onclick="window.location.href='visualizarcalendario.php'">
                <span>Visualizar Consultas </span>
            </button>
        </nav>
    </aside>
</body>
</html>
