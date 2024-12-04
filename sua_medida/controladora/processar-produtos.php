<?php
session_start();
require_once('../controladora/conexao.php');
require_once('../controladora/ProdutoRepositorio.php');
require_once('../Modelo/Produto.php');

// Verifica se os dados do produto foram recebidos via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cria as variáveis a partir do POST
    $nome = $_POST['nome'] ?? '';  // Certifique-se de que 'nome' corresponde ao atributo name do input
    $tipo = $_POST['tipo'] ?? '';
    
    // Convertendo o preço para float e tratando formatação
    $preco = floatval(
        str_replace(
            ',',
            '.',
            str_replace('.', '', $_POST['preco'])  // Converte o preço para formato numérico adequado
        )
    );
    
    $descricao = $_POST['descricao'] ?? '';
    $imagem = $_FILES['imagem'] ?? null;

    // Validação dos campos obrigatórios
    if (empty($nome) || empty($tipo) || empty($preco)) {
        $_SESSION['mensagem'] = 'Preencha todos os campos obrigatórios!';
        header('Location: ../visao/admin.php');
        exit;
    }

    $goTo = "../imagens/produtos/";

    // Corrigido para usar $goTo ao invés de $uploadDir
    if (!is_dir($goTo)) {
        mkdir($goTo, 0777, true); // Certifique-se de usar $goTo aqui
    }

    // Verificando se houve erro no envio da imagem
    if ($imagem && $imagem["error"] === UPLOAD_ERR_OK) {
        $novoNome = uniqid() . "_" . basename($imagem["name"]);
        $novoCaminho = $goTo . $novoNome;

        // Tentando mover a imagem para o diretório de uploads
        if (move_uploaded_file($imagem["tmp_name"], $novoCaminho)) {
            // Criando o produto com a imagem
            $produto = new Produto(null, $tipo, $nome, $descricao, $preco, $novoCaminho);
            $produto->setImagem($novoCaminho);
        } else {
            // Caso não consiga mover a imagem
            $_SESSION['mensagem'] = 'Erro ao mover o arquivo de imagem!';
            header('Location: ../visao/admin.php');
            exit;
        }
    } else {
        // Caso não haja imagem (imagem pode ser opcional)
        $produto = new Produto(null, $tipo, $nome, $descricao, $preco, null);
    }

    // Instanciando o repositório de produtos
    $produtoRepositorio = new ProdutoRepositorio($conn);

    // Tenta cadastrar o produto no banco
    $resultado = $produtoRepositorio->cadastrar($produto);

    // Mensagem de feedback
    if ($resultado) {
        $_SESSION['mensagem'] = 'Produto cadastrado com sucesso!';
    } else {
        $_SESSION['mensagem'] = 'Erro ao cadastrar o produto! ' . $conn->error;
    }

    // Redireciona de volta para a página de administração
    header('Location: ../visao/admin.php');
    exit;
} else {
    // Caso o método não seja POST, redireciona para a página de administração
    $_SESSION['mensagem'] = 'Requisição inválida!';
    header('Location: ../visao/admin.php');
    exit;
}
