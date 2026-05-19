<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'locadora';

$conexao = mysqli_connect($host, $user, $pass, $db);

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}