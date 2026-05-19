<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Clientes</title>
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
            color:rgb(3, 37, 71);
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Consulta de Clientes</h1>

    <?php
    include "mysqlconecta.php";

    $query = mysqli_query($conexao, "SELECT id_cliente, nome, cpf, telefone, email, endereco FROM clientes");

    // Verificando se a consulta retornou resultados
    if (mysqli_num_rows($query) > 0) {
        echo "<table>";
        echo "<tr> <th>ID</th> <th>Nome</th> <th>CPF</th> <th>Telefone</th> <th>Email</th> <th>Endereço</th> <th>Deletar</th> <th>Alterar</th> </tr>";

        while ($saida = mysqli_fetch_array($query)) {
            $id = $saida[0];
            $nome = $saida[1];
            $cpf = $saida[2];
            $telefone = $saida[3];
            $email = $saida[4];
            $endereco = $saida[5];
            
            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $nome . "</td>";
            echo "<td>" . $cpf . "</td>";
            echo "<td>" . $telefone . "</td>";
            echo "<td>" . $email . "</td>";
            echo "<td>" . $endereco . "</td>";
            echo "<td> <a href='excluircliente.php?id=" . $id . "'>Deletar</a></td>";
            echo "<td> <a href='alterarcliente.php?id=" . $id . "'>Alterar</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Nenhum cliente encontrado.</p>";
    }
    ?>

    <div class="back-link">
        <a href="index.php">Voltar para a página inicial</a>
    </div>

</body>
</html>
