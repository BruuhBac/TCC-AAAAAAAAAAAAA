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
    $titulo = $_POST["titulo"];
    $conteudo = $_POST["conteudo"];
    
    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        $sql_check = "SELECT id FROM usuarios WHERE id = $id";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {

            echo '<script>';
            echo 'var substituir = confirm("Já existe uma anotação para este ID. Deseja substituir?");';
            echo 'if (!substituir) {';
            echo '} else {';
            echo '  window.location.href = "pacientes.php";';
            echo '}';
            echo '</script>';


            if ($result_check->num_rows > 0) {
                $sql = "UPDATE usuarios SET titulo='$titulo', conteudo='$conteudo' WHERE id=$id";

                if ($conn->query($sql) === TRUE) {
                    echo "Anotação atualizada com sucesso! Clique <a href='index.html'>aqui</a> para voltar.";
                } else {
                    echo "Esse ID não existe! Clique <a href='index.html'>aqui</a> para voltar.";
                }
            }
        }
    } else {
        echo "ID não especificado.";
    }
}
echo "Esse ID não existe! Clique <a href='pacientes.php'>aqui</a> para voltar.";




$conn->close();
?>
