<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}


function consultaJaAgendada($conn, $data, $hora) {
    $sql = "SELECT * FROM usuarios WHERE data_consulta = '$data' AND hora_consulta = '$hora'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return true; 
    } else {
        return false; 
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $id = $_POST["id"];

    if (consultaJaAgendada($conn, $data, $hora)) {
        echo '<script>';
        echo 'if (confirm("Já existe uma consulta agendada para este horário. Deseja remarcar?")) {';
        echo '   window.location.href = "calendario.html";'; 
        echo '} else {';
        echo '   window.location.href = "index.html";'; 
        echo '}';
        echo '</script>';
    } else {
        
        $sql = "INSERT INTO agendamento (id, data_consulta, hora_consulta) VALUES ('$id', '$data', '$hora')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Consulta agendada com sucesso!");';
            echo 'window.location.href = "calendario.html";'; 
            echo '</script>';
        } else {
            echo '<script>alert("Erro ao agendar a consulta: ' . $conn->error . '");</script>';
        }
    }
}
$conn->close();
?>
