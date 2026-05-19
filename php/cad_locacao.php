<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Locações</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(244, 244, 244);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color:rgb(188, 175, 73);
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color:rgb(218, 211, 77);
        }

        a {
            color:rgb(3, 16, 31);
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline; /* Adiciona o sublinhado quando o usuário passa o mouse sobre o link */
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
            color: green;
        }
    </style>
</head>
<body>

    <h1>Cadastro de Locações</h1>
    <form method="post">
    <input type="number" name="id_cliente" placeholder="ID Cliente" required>
    <input type="number" name="id_veiculo" placeholder="ID Veículo" required>

    <!-- Título para Data Início -->
    <label for="data_inicio">Data Início:</label>
    <input type="date" id="data_inicio" name="data_inicio" required>

    <!-- Título para Data Fim -->
    <label for="data_fim">Data Fim:</label>
    <input type="date" id="data_fim" name="data_fim" required>

    <input type="number" name="valor_total" placeholder="Valor Total" required>
    <input type="submit" value="CADASTRAR">
</form>

    <a href="consultalocacao.php">Consultar Locações</a>
    
    <a href="index.php">Voltar para a página inicial</a>

    <?php
    include "mysqlconecta.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebendo os dados do formulário
        $id_cliente = $_POST['id_cliente'];
        $id_veiculo = $_POST['id_veiculo'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        $valor_total = $_POST['valor_total'];

        // Usando prepared statement para evitar injeção SQL
        $sql = $conexao->prepare("INSERT INTO locacoes (id_cliente, id_veiculo, data_inicio, data_fim, valor_total) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("iissd", $id_cliente, $id_veiculo, $data_inicio, $data_fim, $valor_total);

        if ($sql->execute()) {
            echo "<p class='message'>Locação cadastrada com sucesso!</p>";
        } else {
            echo "<p class='message' style='color: red;'>Erro ao cadastrar locação.</p>";
        }

        // Fechando a conexão
        $sql->close();
        $conexao->close();
    }
    ?>

</body>
</html>
