<?php
session_start();
include_once '../controladora/conexao.php';
include_once '../Modelo/Produto.php';
include_once '../controladora/ProdutoRepositorio.php';

// Verifica se os dados do produto foram recebidos via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cria as variáveis a partir do POST
    $nome = $_POST['nome'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $imagem = $_POST['imagem'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $descricao = $_POST['descricao'] ?? ''; // Adicionando a descrição
    
    
    // Verifica se a imagem foi enviada e faz o upload
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $imagemTemp = $_FILES['imagem']['tmp_name'];
        $imagemNome = $_FILES['imagem']['name'];
        $imagemDiretorio = 'uploads/' . basename($imagemNome); // Define o diretório onde a imagem será salva
        
        // Move a imagem para o diretório
        if (move_uploaded_file($imagemTemp, $imagemDiretorio)) {
            // Cria um objeto Produto com a imagem
            $produto = new Produto(null, $nome, $tipo, $preco, $imagemDiretorio, $descricao);
        } else {
            $_SESSION['mensagem'] = 'Erro ao enviar a imagem!';
            header('Location: ../visao/admin.php');
            exit;
        }
    } else {
        // Caso a imagem não seja enviada, cria o produto sem a imagem
        $produto = new Produto(null, $nome, $tipo, $preco, null, $descricao);
    }
    
    // Instancia o repositório de produtos
    $produtoRepositorio = new ProdutoRepositorio($conn);
    $resultado = $produtoRepositorio->cadastrar($produto);
    
    // Verifica se o produto foi cadastrado com sucesso
    if ($resultado) {
        $_SESSION['mensagem'] = 'Produto cadastrado com sucesso!';
    } else {
        $_SESSION['mensagem'] = 'Erro ao cadastrar o produto!';
    }
    
    // Redireciona de volta para a página de administração
    header('Location: ../visao/admin.php');
    exit;
}
?>


