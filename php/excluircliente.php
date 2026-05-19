<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        h1 {
            color: #333;
        }

        a {
            margin-top: 20px;
            font-size: 16px;
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Excluir Cliente</h1>
    <?php
    include "mysqlconecta.php";

    // Verifica se o ID foi passado via GET
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Executa a exclusão do cliente
        $sql = "DELETE FROM clientes WHERE id_cliente = $id";
        if (mysqli_query($conexao, $sql)) {
            echo "Cliente com ID $id foi excluído com sucesso!";
        } else {
            echo "Erro ao excluir cliente: " . mysqli_error($conexao);
        }
    } else {
        echo "ID do cliente não fornecido.";
    }

    ?>
    <a href="index.php">Voltar para a página inicial</a>

</body>
</html>
