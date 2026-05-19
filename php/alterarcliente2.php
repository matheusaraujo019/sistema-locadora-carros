<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração</title>
    <link rel="stylesheet" href="estilo.css">

    <!-- 7 -->
</head>

<body>
   
            <?php
            include "mysqlconecta.php"; // Inclui o arquivo de conexão com o banco de dados

            $id        = $_POST['ID']; // Obtém o código do cliente enviado pelo formulário
            $nome      = $_POST['nome']; // Obtém o nome do cliente enviado pelo formulário
            $cpf     = $_POST['cpf']; // Obtém o cpf do cliente enviado pelo formulário
            $telefone  = $_POST['telefone']; // Obtém o numero do cliente enviado pelo formulário
            $email  = $_POST['email']; // Obtém o email do cliente enviado pelo formulário
            $endereco    = $_POST['endereco']; // Obtém o endereco do cliente enviado pelo formulário
          

            // Atualiza os dados do cliente no banco de dados com base no código fornecido
            mysqli_query($conexao, "update clientes set nome = \"$nome\", cpf = \"$cpf\", telefone = \"$telefone\", 
            email = \"$email\", endereco = \"$endereco\"
            WHERE id_cliente = '$id'") or die("erro1000"); // Mensagem de erro caso a consulta falhe
            ?>

            <h1 class="titulo">CLIENTE ALTERADO COM <span>SUCESSO</span></h1>




            <a class="voltar" href="index.php">INCLUIR</a><!--Botão para voltar para página index.php-->
            <a class="voltar" href="consultacliente.php">CONSULTA</a><!--Botão para voltar para página consulta.php-->

</body>

</html>