    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tcc";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $dataNascimento = $_POST["data_nascimento"];
    $sexo = $_POST["sexo"];
    $naturalidade = $_POST["naturalidade"];
    $estado = $_POST["estado"];
    $endereco = $_POST["endereco"];
    $escolaridade = $_POST["escolaridade"];
    $escola = $_POST["escola"];
    $pai = $_POST["pai"];
    $idadePai = $_POST["idade_pai"];
    $mae = $_POST["mae"];
    $idadeMae = $_POST["idade_mae"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $tipo_pagamento = $_POST["tipo_pagamento"];

    $sql = "INSERT INTO usuarios (nome, idade, data_nascimento, sexo, naturalidade, estado, escolaridade, escola, pai, idade_pai, mae, idade_mae, endereco, email, telefone, tipo_pagamento) VALUES ('$nome', $idade, '$dataNascimento', '$sexo', '$naturalidade', '$estado', '$escolaridade', '$escola', '$pai', $idadePai, '$mae', $idadeMae, '$endereco', '$email', '$telefone', '$tipo_pagamento')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro inserido com sucesso.";
    } else {
        echo "Erro ao inserir registro: " . $conn->error;
    }

    $conn->close();
    ?>
