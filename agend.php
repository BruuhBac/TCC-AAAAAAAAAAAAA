<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_consulta = $_POST["data_consulta"];
    $hora_consulta = $_POST["hora_consulta"];
    $nome = $_POST["nome"];

    $sql_check = "SELECT id FROM usuarios WHERE id = $nome";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        $sql = "UPDATE usuarios SET data_consulta='$data_consulta', hora_consulta='$hora_consulta' WHERE id=$nome";

        if ($conn->query($sql) === TRUE) {
            echo "Anotação atualizada com sucesso! Clique <a href='index.html'>aqui</a> para voltar.";
        } else {
            echo "Erro ao atualizar a anotação: " . $conn->error;
        }
    } else {
        echo "ID não encontrado na tabela 'usuarios'. Clique <a href='index.html'>aqui</a> para voltar.";
    }
} else {
    echo "Requisição inválida.";
}

$conn->close();
?>
