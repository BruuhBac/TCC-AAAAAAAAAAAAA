<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Visualizar Calendário</title>
</head>
<body>
    <main class="main">
        <h1>Consultas Agendadas</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Hora</th>
            </tr>
            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tcc";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Falha na conexão com o banco de dados: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM usuarios";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "    <th>ID</th>";
                echo "    <th>Nome</th>";
                echo "    <th>Data</th>";
                echo "    <th>Hora</th>";
                echo "</tr>";
            
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "    <td>" . $row["id"] . "</td>";
                    echo "    <td>" . $row["nome"] . "</td>";
                    echo "    <td>" . $row["data_consulta"] . "</td>";
                    echo "    <td>" . $row["hora_consulta"] . "</td>";
                    echo "</tr>";
                }
            
                echo "</table>";
            } else {
                echo "Nenhuma consulta agendada.";
            }
            

            $conn->close();
            ?>
        </table>

        <button onclick="window.location.href='calendario.html'">
            <span>Voltar</span>
        </button>
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
