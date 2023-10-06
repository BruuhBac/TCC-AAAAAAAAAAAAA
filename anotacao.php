<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Anotações</title>
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

    .nota input[type="text"],
    .nota textarea,
    .nota button {
        width: 100%;
        margin-bottom: 10px;
        padding: 10px;
    }

    .nota button {
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .ver-button {
        text-align: center;
    }

    .ver-button a {
        display: inline-block;
        background-color: #28a745;
        color: #fff;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .ver-button a:hover {
        background-color: #1e7e34;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Anotações</h1>

        <form action="salvar_anotacao.php" method="POST">
            <div class="nota">
                <label for="id">ID do Usuário:</label>
                <input type="number" id="id" name="id" required>
                <br>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo">
                <label for="conteudo">Conteúdo:</label>
                <textarea id="conteudo" name="conteudo" placeholder="Digite sua anotação aqui..." required></textarea>
                <button type="submit">Salvar</button>
            </div>
        </form>

        <form action="buscar.php" method="POST">
        <div class="ver-button">
        <a href="ver_anotacoes.php">Ver Anotações</a>
</div>
        </form>
        

    </div>
</body>
</html>
