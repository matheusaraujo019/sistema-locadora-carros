<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Locações</title>
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

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color:rgb(218, 211, 77);
            color: white;
        }

        td a {
            color:rgb(3, 14, 2);
            text-decoration: none;
            font-size: 14px;
        }

        td a:hover {
            text-decoration: underline;
        }

        .back-link {
            margin-top: 20px;
            font-size: 16px;
        }

        .back-link a {
            color:rgb(0, 5, 10);
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Consulta de Locações</h1>

    <?php
    include "mysqlconecta.php";

    $query = mysqli_query($conexao, "SELECT id_locacao, id_cliente, id_veiculo, data_inicio, data_fim, valor_total FROM locacoes");

    // Verificando se a consulta retornou resultados
    if (mysqli_num_rows($query) > 0) {
        echo "<table>";
        echo "<tr> <th>ID</th> <th>ID Cliente</th> <th>ID Veículo</th> <th>Data Início</th> <th>Data Fim</th> <th>Valor Total</th> <th>Deletar</th> <th>Alterar</th> </tr>";

        while ($saida = mysqli_fetch_array($query)) {
            $id = $saida[0];
            $id_cliente = $saida[1];
            $id_veiculo = $saida[2];
            $data_inicio = $saida[3];
            $data_fim = $saida[4];
            $valor_total = $saida[5];
            
            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $id_cliente . "</td>";
            echo "<td>" . $id_veiculo . "</td>";
            echo "<td>" . $data_inicio . "</td>";
            echo "<td>" . $data_fim . "</td>";
            echo "<td>" . $valor_total . "</td>";
            echo "<td> <a href='excluirlocacao.php?id=" . $id . "'>Deletar</a></td>";
            echo "<td> <a href='alterarlocacao.php?id=" . $id . "'>Alterar</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Nenhuma locação encontrada.</p>";
    }
    ?>

    <div class="back-link">
        <a href="index.php">Voltar para a página inicial</a>
    </div>

</body>
</html>
