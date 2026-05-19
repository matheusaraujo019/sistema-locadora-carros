<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>
    <style>
        /* Definir o estilo geral do corpo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        /* Estilo para os links */
        a {
            text-decoration: none;
            color: white;
            background-color:rgb(174, 174, 21) ;
            padding: 12px 24px;
            margin: 10px 0;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        /* Efeito de hover nos links */
        a:hover {
            background-color:rgb(137, 141, 122);
        }

        /* Estilo para o título */
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Locadora Araujo sistema de cadastro</h1>
    <a href="cad_cliente.php">Cadastrar Cliente</a>
    <a href="cad_locacao.php">Cadastrar Locação</a>
    <a href="cad_veiculo.php">Cadastrar Veículo</a>
</body>
</html>
