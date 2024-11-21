<?php
session_start();

// Função para remover item do carrinho
if (isset($_GET['remover'])) {
    $id_produto = $_GET['remover'];
    foreach ($_SESSION['carrinho'] as $key => $item) {
        if ($item['id'] = $id_produto) { // Corrigido o operador para comparação (==)
            unset($_SESSION['carrinho'][$key]);
            break;
        }
    }
    $_SESSION['carrinho'] = array_values($_SESSION['carrinho']); // Reindexar array
}

// Função para limpar o carrinho inteiro
if (isset($_GET['limpar'])) {
    unset($_SESSION['carrinho']);
}

// Verificar se o carrinho não está vazio
if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
    echo "Seu carrinho está vazio!";
    header("Refresh: 1; url=../visao/perfil.php"); // Redireciona após 2 segundos
    exit();
}

$carrinho = $_SESSION['carrinho'];
$total = 0;

foreach ($carrinho as $item) {
    // Garantir que 'preco' é um número
    $preco = str_replace(['.', ','], ['', '.'], $item['preco']); // Remove pontos e converte vírgulas para ponto
    $total += (float)$preco; // Converte para float e soma
}

// Montar a mensagem para o WhatsApp
$mensagem = "Oi, gostaria de saber mais sobre os seguintes produtos:\n";
foreach ($carrinho as $item) {
    $preco_formatado = number_format((float)str_replace(['.', ','], ['', '.'], $item['preco']), 2, ',', '.');
    $mensagem .= "- " . $item['item'] . " - R$ " . $preco_formatado . "\n";
}
$mensagem .= "\nTotal: R$ " . number_format($total, 2, ',', '.');
$mensagem_encoded = urlencode($mensagem);
$numero_telefone = "5511953004751";
$voltar = 'perfil.php';

// URL final do WhatsApp
$url_whatsapp = "https://api.whatsapp.com/send?phone={$numero_telefone}&text={$mensagem_encoded}";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!-- Define o conjunto de caracteres usado no documento, aqui é UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo.jpeg" type="image/x-icon">
    <!-- Define a escala inicial e a largura da viewport para uma visualização responsiva em dispositivos móveis -->
    <link rel="stylesheet" href="../css/estilo.css">
    
    <!-- Link para a pasta e o arquivo de estilos CSS que define a aparência do documento -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Link para o Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Sua Medida - Ateliê de costura</title>
    <!-- Define o título da página, que aparece na aba do navegador -->

    
</head>
<header>
    <div id="area_cabecalho"><!--cabecalho -->
        <div id="area_logo"><!-- logo-->
            <h1 id="cor_logo"><span style="color: black;">Sua</span><span style="color: #8C8C8C;">Medida</span></h1>
        </div>
</header>        
<body>
    <div class="container-finalizarcmp">
        <h1 style="text-align: center;">Finalizar Compra</h1>
 
        <p>Itens no seu carrinho:</p>

            <?php foreach ($carrinho as $item): ?>
                <li>
                    <?php echo $item['item']; ?> - R$ <?php echo number_format((float)str_replace(['.', ','], ['', '.'], $item['preco']), 2, ',', '.'); ?>
                    <a href="?remover=true" onclick="return confirm('Tem certeza que deseja remover este item?');">Remover</a>
                </li>
            <?php endforeach; ?>

        <hr>
        <h3>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h3>

        <a href="?limpar=true" onclick="return confirm('Tem certeza que deseja limpar o carrinho?');" class="btn btn-danger">Limpar Carrinho</a>

        <br><br>

        <a href="<?php echo $url_whatsapp; ?>" class="btn btn-success" target="_blank">Finalizar Compra no WhatsApp</a>
        
        <br><br>
        
        <a href="perfil.php" onclick = $voltar class="btn btn-danger">Voltar</a>
        
    </div>
</table>
</body>
</html>
