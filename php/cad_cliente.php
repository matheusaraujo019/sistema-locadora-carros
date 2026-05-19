<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
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

    <h1>Cadastro de Clientes</h1>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="cpf" placeholder="CPF" required>
        <input type="text" name="telefone" placeholder="Telefone" required>
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="endereco" placeholder="Endereço">
        <input type="submit" value="CADASTRAR">
    </form>

    <a href="consultacliente.php">Consultar Clientes</a>
    
    <a href="index.php">Voltar para a página inicial</a>

    <?php
    include "mysqlconecta.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];

        // Usando prepared statement para prevenir SQL Injection
        $sql = $conexao->prepare("INSERT INTO clientes (nome, cpf, telefone, email, endereco) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("sssss", $nome, $cpf, $telefone, $email, $endereco);

        if ($sql->execute()) {
            echo "<p class='message'>Cliente cadastrado com sucesso!</p>";
        } else {
            echo "<p class='message' style='color: red;'>Erro ao cadastrar cliente.</p>";
        }

        $sql->close();
        $conexao->close();
    }
    ?>

</body>
</html>
