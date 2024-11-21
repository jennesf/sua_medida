<?php
session_start();
require_once "conexao.php";
require 'ProdutoRepositorio.php';
require '../Modelo/Produto.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])) {
    $id = $_POST['id'] ?? null;
    $tipo = $_POST['tipo'] ?? null;
    $nomeP = $_POST['nomeP'] ?? null;
    $descricao = $_POST['descricao'] ?? null;
    $preco = $_POST['preco'] ?? null;

    if (!$id || !$tipo || !$nomeP || !$descricao || !$preco) {
        echo "Erro: Dados obrigatórios não foram enviados.";
        exit;
    }

    $produtosRepositorio = new ProdutoRepositorio($conn);
    $produto = new Produto($id, $tipo, $nomeP, $descricao, $preco);

    if (isset($_FILES['imagem']['name']) && $_FILES['imagem']['error'] === 0) {
        $nomeImagem = uniqid() . '_' . $_FILES['imagem']['name'];
        $diretorioDestino = "../imagens/produtos/";
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorioDestino . $nomeImagem);
        $produto->setImagem($diretorioDestino . $nomeImagem);
    }

    $produtosRepositorio->atualizarProduto($produto);
    header("Location: ../visao/admin.php?success=1");
    exit;
} else {
    echo "Erro: Requisição inválida.";
}


