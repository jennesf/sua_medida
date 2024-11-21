<?php
session_start();

if (!isset($_SESSION['usuarios']) || !isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit;
}

include 'Menu.php';
include '../controladora/conexao.php';
include '../Modelo/Produto.php';
include '../controladora/ProdutoRepositorio.php';

$produtosRepositorio = new ProdutoRepositorio($conn);
$produto = $produtosRepositorio->obterProdutoPorId($_GET['id']);
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/estilo.css">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/form.css">
  <title>Editar Produto</title>
</head>

<body>
  <main>
    <section class="container-admin-banner">
      <h1>Editar Produto</h1>
    </section>
    <section class="container-form">
      <form method="POST" action="../controladora/processar-editar-produto.php" enctype="multipart/form-data">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nomeP" value="<?= $produto->getNome(); ?>" required>

        <label for="tipo">Tipo</label>
        <input type="text" id="tipo" name="tipo" value="<?= $produto->getTipo(); ?>" required>

        <label for="descricao">Descrição</label>
        <textarea id="descricao" name="descricao" required><?= $produto->getDescricao(); ?></textarea>

        <label for="preco">Preço</label>
        <input type="text" id="preco" name="preco" value="<?= $produto->getPreco(); ?>" required>

        <label for="imagem">Imagem Atual</label>
        <div class="container-foto">
          <img src="<?= $produto->getImagem(); ?>" alt="Imagem do Produto" width="200">
        </div>
        <input type="file" name="imagem" accept="image/*">
        <input type="hidden" name="id" value="<?= $produto->getId(); ?>">

        <input type="submit" name="editar" value="Salvar Alterações">
      </form>
    </section>
  </main>
</body>

</html>

