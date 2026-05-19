<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
 
            <?php
            include "mysqlconecta.php"; // Inclui o arquivo de conexão com o banco de dados

            $id        = $_POST['ID']; // Obtém o código do cliente enviado pelo formulário
            $modelo      = $_POST['modelo']; // Obtém o nome do cliente enviado pelo formulário
            $marca     = $_POST['marca']; // Obtém o cpf do cliente enviado pelo formulário
            $ano  = $_POST['ano']; // Obtém o numero do cliente enviado pelo formulário
            $placa  = $_POST['placa']; // Obtém o email do cliente enviado pelo formulário
            $valor_diaria    = $_POST['valor_diaria']; // Obtém o endereco do cliente enviado pelo formulário
          

            // Atualiza os dados do veiculo no banco de dados com base no código fornecido
            mysqli_query($conexao, "update veiculos set modelo = \"$modelo\", marca = \"$marca\", ano = \"$ano\", 
            placa = \"$placa\", valor_diaria = \"$valor_diaria\"
            WHERE id_veiculos = '$id'") or die("erro1000"); // Mensagem de erro caso a consulta falhe
            ?>

            <h1 class="titulo">VEÍCULO ALTERADO COM <span>SUCESSO</span></h1>




            <a class="voltar" href="index.php">INCLUIR</a><!--Botão para voltar para página index.php-->
            <a class="voltar" href="consultaveiculo.php">CONSULTA</a><!--Botão para voltar para página consulta.php-->

</body>

</html>