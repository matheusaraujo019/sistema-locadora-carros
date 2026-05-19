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
    <div class="conteudo"> <!--Início conteudo -->
        <div class="interface"><!-- Início EStilo Padrão todos os sites -->

            <?php
            include "mysqlconecta.php"; // Inclui o arquivo de conexão com o banco de dados

            $id        = $_POST['ID']; // Obtém o código do cliente enviado pelo formulário
            $id_cliente      = $_POST['id_cliente']; // Obtém o id_cliente da locacao enviada pelo formulário
            $id_veiculo     = $_POST['id_veiculo']; // Obtém o id_veiculo da locacao enviada pelo formulário
            $data_inicio  = $_POST['data_inicio']; // Obtém a data_inicio da locacao enviada pelo formulário
            $data_fim  = $_POST['data_fim']; // Obtém a data_fim da locacao enviada pelo formulário
            $valor_total    = $_POST['valor_total']; // Obtém o valor_total da locacao enviada pelo formulário
          

            // Atualiza os dados da locacao no banco de dados com base no código fornecido
            mysqli_query($conexao, "update locacoes set id_cliente = \"$id_cliente\", id_veiculo = \"$id_veiculo\", data_inicio = \"$data_inicio\", 
            data_fim = \"$data_fim\", valor_total = \"$valor_total\"
            WHERE id_locacao = '$id'") or die("erro1000"); // Mensagem de erro caso a consulta falhe
            ?>

            <h1 class="titulo">LOCAÇÃO ALTERADA COM <span>SUCESSO</span></h1>




            <a class="voltar" href="index.php">INCLUIR</a><!--Botão para voltar para página index.php-->
            <a class="voltar" href="consultalocacao.php">CONSULTA</a><!--Botão para voltar para página consulta.php-->

        </div><!-- Fim EStilo Padrão todos os sites -->
    </div> <!--Fim conteudo -->
</body>

</html>