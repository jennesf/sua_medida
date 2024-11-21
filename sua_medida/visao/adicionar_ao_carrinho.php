<?php
session_start();

// Receber os dados do item
$item = $_POST['item'];
$preco = $_POST['preco'];

// Verificar se o carrinho já existe na sessão
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Adicionar item ao carrinho
$_SESSION['carrinho'][] = ['item' => $item, 'preco' => $preco];

// Redirecionar de volta para o carrinho
header('Location: perfil.php');
exit();
?>
