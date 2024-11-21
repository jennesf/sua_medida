<?php
$servername = "144.217.39.54";  // ou o nome do seu servidor
$username = "hostdeprojetos";  // nome de usuário do banco
$password = "ifspgru@2022";  // senha do banco (pode estar vazia se você estiver usando XAMPP)
$dbname = "hostdeprojetos_suamedida";  // nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>