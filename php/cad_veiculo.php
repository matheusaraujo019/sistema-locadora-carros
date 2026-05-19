<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veículos</title>
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

    <h1>Cadastro de Veículos</h1>
    <form method="post">
        <input type="text" name="modelo" placeholder="Modelo" required>
        <input type="text" name="marca" placeholder="Marca" required>
        <input type="number" name="ano" placeholder="Ano" required>
        <input type="text" name="placa" placeholder="Placa" required>
        <input type="number" name="valor_diaria" placeholder="Valor Diária" required>
        <input type="submit" value="CADASTRAR">
    </form>

    <a href="consultaveiculo.php">Consultar Veículos</a>
    
    <a href="index.php">Voltar para a página inicial</a>

    <?php
    include "mysqlconecta.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebendo os dados do formulário
        $modelo = $_POST['modelo'];
        $marca = $_POST['marca'];
        $ano = $_POST['ano'];
        $placa = $_POST['placa'];
        $valor_diaria = $_POST['valor_diaria'];

        // Usando prepared statement para prevenir injeção SQL
        $sql = $conexao->prepare("INSERT INTO veiculos (modelo, marca, ano, placa, valor_diaria) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("ssisi", $modelo, $marca, $ano, $placa, $valor_diaria);

        if ($sql->execute()) {
            echo "<p class='message'>Veículo cadastrado com sucesso!</p>";
        } else {
            echo "<p class='message' style='color: red;'>Erro ao cadastrar veículo.</p>";
        }

        // Fechando a conexão
        $sql->close();
        $conexao->close();
    }
    ?>

</body>
</html>
