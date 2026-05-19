<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Locação</title>
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

    <h1>Excluir Locação</h1>

    <?php
    include "mysqlconecta.php";

    // Verifica se o ID foi passado via GET
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Executa a exclusão da locação
        $sql = "DELETE FROM locacoes WHERE id_locacao = $id";
        if (mysqli_query($conexao, $sql)) {
            echo "Locação com ID $id foi excluída com sucesso!";
        } else {
            echo "Erro ao excluir locação: " . mysqli_error($conexao);
        }
    } else {
        echo "ID da locação não fornecido.";
    }

    ?>

    <a href="index.php">Voltar para a página inicial</a>

</body>
</html>
