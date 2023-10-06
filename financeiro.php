<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Document</title>
    <style>
        .table-container {
            margin-left: 300px;
        }

    </style>
</head>
<body>
<table class="content-table">
    <tr>
        <td>
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
        </td>
        <td>
            <div class="table-container">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tcc";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }

                function isDatePassed($date) {
                    return strtotime($date) < strtotime(date("Y-m-d"));
                }

                function togglePaymentStatus($conn, $id, $status) {
                    $sql = "UPDATE usuarios SET foi_pago = $status WHERE id = $id";

                    if ($conn->query($sql) === TRUE) {
                        return true;
                    } else {
                        return false;
                    }
                }

                $sql = "SELECT * FROM usuarios";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<form method='POST'>";
                    echo "<table class='finance-table'>";
                    echo "<thead>";
                    echo "    <tr>";
                    echo "        <th>ID</th>";
                    echo "        <th>Nome</th>";
                    echo "        <th>Tipo de Pagamento</th>";
                    echo "        <th>Estado</th>";
                    echo "        <th>Já passou a data da consulta?</th>";
                    echo "        <th>Status atual:</th>";
                    echo "    </tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["tipo_pagamento"] . "</td>";
                        echo "<td>" . $row["estado"] . "</td>";
                        echo "<td>";

                        if (isDatePassed($row["data_consulta"])) {
                            echo "<input type='checkbox' checked disabled>";
                        } else {
                            echo "<input type='checkbox' disabled>";
                        }

                        echo "</td>";
                        echo "<td>";

                        $foiPago = $row["foi_pago"];
                        $statusLabel = $foiPago == 1 ? "Pago" : "Não Pago";

                        echo "<button type='submit' name='toggleStatus' value='" . $row["id"] . "'>";
                        echo $statusLabel;
                        echo "</button>";

                        echo "</td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                    echo "</form>";
                } else {
                    echo "<p>Nenhum registro encontrado.</p>";
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["toggleStatus"])) {
                    $idToToggle = intval($_POST["toggleStatus"]);
                    $sqlStatus = "SELECT foi_pago FROM usuarios WHERE id = $idToToggle";
                    $resultStatus = $conn->query($sqlStatus);

                    if ($resultStatus->num_rows > 0) {
                        $rowStatus = $resultStatus->fetch_assoc();
                        $currentStatus = $rowStatus["foi_pago"];
                        $newStatus = $currentStatus == 1 ? 0 : 1;

                        if (togglePaymentStatus($conn, $idToToggle, $newStatus)) {
                            header("Location: financeiro.php");
                            exit;
                        } else {
                            echo "Erro ao alternar o status de pagamento: " . $conn->error;
                        }
                    }
                }

                $conn->close();
                ?>
            </div>
        </td>
    </tr>
</table>
</body>
</html
