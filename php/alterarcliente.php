<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Alteração</title> 
    <style>
        
    /* Estilos gerais para o corpo */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Seção de conteúdo */
.conteudo {
    max-width: 900px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Estilo da interface */
.interface {
    padding: 20px;
}

/* Estilo do título */
.titulo {
    font-size: 2.5em;
    color: #2c3e50;
    text-align: center;
    margin-bottom: 20px;
}

/* Cor de destaque no título */
.titulo span {
    color: #e74c3c;
}

/* Estilo da tabela */
.tabela {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

/* Estilos para cabeçalhos da tabela */
.tabela th {
    background-color: #3498db;
    color: #fff;
    padding: 12px;
    text-align: left;
}

/* Estilos para as células da tabela */
.tabela td {
    padding: 12px;
    border: 1px solid #ddd;
}

/* Estilo dos campos de texto */
.alteracao {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Estilo do botão de confirmação */
.confirmar {
    background-color: #2ecc71;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.confirmar:hover {
    background-color: #27ae60;
}

/* Estilo dos links para voltar */
.voltar {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 20px;
    text-decoration: none;
    background-color: #f39c12;
    color: #fff;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.voltar:hover {
    background-color: #e67e22;
}


    </style>
</head>

<body>
            <form method="post" action="alterarcliente2.php"> <!-- Formulário para envio de dados com método POST -->
                <h1 class="titulo">ALTE<span>RAÇÃO</span></h1> <!-- Título da página -->

                <table class="tabela"> <!-- Início da tabela -->
                    <?php
                    include "mysqlconecta.php"; // Inclui o arquivo de conexão com o banco de dados

                    $id = $_GET["id"]; // Obtém o ID do cliente da URL

                    // Consulta ao banco de dados para selecionar os detalhes do cliente pelo código
                    $query = mysqli_query($conexao, "SELECT id_cliente, nome, cpf,telefone, email, endereco FROM clientes 
                    WHERE id_cliente = '$id'") or die ("erro10000"); // Mensagem de erro caso a consulta falhe

                    // Cabeçalho da tabela com os títulos das colunas
                    echo "<tr>  <th>ID</th> <th>Nome</th> <th>CPF</th> <th>Telefone</th> <th>Email</th> <th>Endereço</th>
                     <th>Confirmar</th></tr>"; 

                    // Loop para exibir os dados do cliente
                    while ($saida = mysqli_fetch_array($query)) {
                        // Armazena os dados do cliente em variáveis
                        $id     = $saida[0]; // Código do cliente
                        $nome       = $saida[1]; // Nome do cliente
                        $cpf      = $saida[2]; // cpf do cliente
                        $telefone   = $saida[3]; // telefone do cliente
                        $email   = $saida[4]; // email do cliente
                        $endereco   = $saida[5]; // endereco do cliente
                
                        

                        // Criação de uma nova linha na tabela com os dados e campos para edição
                        echo ("<tr class='databases'>");
                        echo (" <td><input type='hidden' name='ID' value='$id'> $id </td>"); // Campo oculto para o código
                        echo (" <td> <input class='alteracao' type='text' name='nome'value='$nome'> </input></td>"); // Campo de texto para nome
                        echo (" <td><input class='alteracao' type='number' name='cpf'value='$cpf'> </input></td>"); // Campo numérico para cpf
                        echo (" <td> <input class='alteracao' type='number' name='telefone'value='$telefone'> </input></td>"); // Campo numérico para telefone
                        echo (" <td> <input class='alteracao' type='text' name='email'value='$email'> </input></td>"); // Campo de texto para email
                        echo (" <td> <input class='alteracao' type='text' name='endereco'value='$endereco'> </input></td>"); // Campo de texto para endereco
                        echo ("<td><input class='confirmar' type='submit' value='Ok'></input></td>"); // Botão para confirmar alteração
                    }
                    
                    echo ("</tr>"); // Fecha a última linha da tabela
                    mysqli_close($conexao); // Fecha a conexão com o banco de dados
                    ?>
                    </tr>
                </table><!-- Fim da tabela -->

            </form>

            <!-- Links para voltar a outras páginas -->
            <a class="voltar" href="index.php">INCLUIR</a> <!-- Botão para voltar para a página de inclusão -->
            <a class="voltar" href="consultacliente.php">CONSULTA</a> <!-- Botão para voltar para a página de consulta -->

       
</body>

</html>
