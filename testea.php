<?php
    // Arquivo consultas.php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Configurações do banco de dados
        $host = "localhost";
        $usuario = "root";
        $senha = "Bru123@1";
        $banco = "tcc";

        // Conexão com o banco de dados
        $conn = new mysqli($host, $usuario, $senha, $banco);

        // Verifica se a conexão foi estabelecida com sucesso
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Obtém o nome do formulário
        $nome = $_POST["nome"];

        // Consulta SQL para obter os dados do usuário
        $sql = "SELECT * FROM consultas WHERE nome = '$nome'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibir os dados do usuário
            while ($row = $result->fetch_assoc()) {
                echo "<h2>Dados do Usuário:</h2>";
                echo "Nome: " . $row["nome"] . "<br>";
                echo "Idade: " . $row["idade"] . "<br>";

                // Formulário para inserir anotações
                echo "<h2>Anotações:</h2>";
                echo "<form method='POST' action='salvar_anotacoes.php'>";
                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                echo "<textarea name='anotacoes' rows='4' cols='50'>" . $row["anotacoes"] . "</textarea><br>";
                echo "<button type='submit'>Salvar Anotações</button>";
                echo "</form>";
            }
        } else {
            echo "Nenhum usuário encontrado com o nome: $nome";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    }
    ?>