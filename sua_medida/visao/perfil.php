<?php
session_start();  // Iniciar sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit;
}


// Exibe os dados do perfil
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$perfil = $_SESSION['perfil'];

require_once ('Menu.php');
require ("../controladora/Autenticacao.php");
require_once('../controladora/conexao.php');
require_once('../Modelo/Produto.php');
require_once('../controladora/ProdutoRepositorio.php');

$produtoRepositorio = new ProdutoRepositorio($conn);
$produtos = $produtoRepositorio->buscarTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!-- Define o conjunto de caracteres usado no documento, aqui é UTF-8 -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Define a escala inicial e a largura da viewport para uma visualização responsiva em dispositivos móveis -->
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/carrinho.css"> <!-- Link para o CSS externo -->
    
    <!-- Link para a pasta e o arquivo de estilos CSS que define a aparência do documento -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Link para o Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Link para a pasta e o arquivo de estilos CSS que define a aparência do documento -->
    
    <title>Sua Medida - Ateliê de costura</title>
    <!-- Define o título da página, que aparece na aba do navegador -->
</head>

<header>
    <div id="area_cabecalho"><!--cabecalho -->
        <div id="area_logo"><!-- logo-->
            <h1 id="cor_logo">Sua<span style="color: #8C8C8C;">Medida</span></h1>
        </div>


        
    <!-- Cabeçalho do site -->
    <nav>
            <!-- Seção de navegação -->
        
</header>

<!--seção de navegação das paginas-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top"></nav>

<div id="section1" class="container-fluid bg-success text-white" style="padding:100px 20px;">
  
  <div class="container mt-5">

        <h1> Escolha as roupas que deseja adicionar ao seu carrinho</h1>
        <br><br><br>

        <div class="home">
                <!-- Roupas -->
                <div class="home">
                <img src="../img/1.jpeg" alt="Cropped Listrado">
                    <div class="home-descricao">
                        <h5>Cropped Listrado</h5>
                        <p>Tamanho Único</p>
                        <p>R$ 49,90</p>
                        <form action="adicionar_ao_carrinho.php" method="POST">
                            <input type="hidden" name="item" value="Cropped Listrado">
                            <input type="hidden" name="preco" value="49,90">
                            <button type="submit" class="btn-adicionar-carrinho">Adicionar ao Carrinho</button>
                        </form>
                    </div>
                </div>

                <div class="home">
                <img src="../img/2.jpeg" alt="Cropped Branco">
                    <div class="home-descricao">
                        <h5>Cropped de botão</h5>
                        <p>Tamanho Único</p>
                        <p>R$ 59,90</p>
                        <form action="adicionar_ao_carrinho.php" method="POST">
                            <input type="hidden" name="item" value="Cropped Branco">
                            <input type="hidden" name="preco" value="59,90">
                            <button type="submit" class="btn-adicionar-carrinho">Adicionar ao Carrinho</button>
                        </form>
                    </div>
                </div>

                <div class="home">
                <img src="../img/3.jpeg" alt="Vestido Preto">
                    <div class="home-descricao">
                        <h5>Vestido risca de giz</h5>
                        <p>Tamanho Único</p>
                        <p>R$ 139,90</p>
                        <form action="adicionar_ao_carrinho.php" method="POST">
                            <input type="hidden" name="item" value="Vestido Preto">
                            <input type="hidden" name="preco" value="139,90">
                            <button type="submit" class="btn-adicionar-carrinho">Adicionar ao Carrinho</button>
                        </form>
                    </div>
                </div>

                <div class="home">
                <img src="../img/4.jpeg" alt="Camisa Branca">
                    <div class="home-descricao">
                        <h5>Camisa Branca</h5>
                        <p>Tamanho Único</p>
                        <p>R$ 109,90</p>
                        <form action="adicionar_ao_carrinho.php" method="POST">
                            <input type="hidden" name="item" value="Camisa Branca">
                            <input type="hidden" name="preco" value="109,90">
                            <button type="submit" class="btn-adicionar-carrinho">Adicionar ao Carrinho</button>
                        </form>
                    </div>
                </div>

                <div class="home">
                <img src="../img/5.jpeg" alt="Jaqueta Preta">
                    <div class="home-descricao">
                        <h5>Blazer cropped</h5>
                        <p>Tamanho Único</p>
                        <p>R$ 199,99</p>
                        <form action="adicionar_ao_carrinho.php" method="POST">
                            <input type="hidden" name="item" value="Jaqueta Preta">
                            <input type="hidden" name="preco" value="199,99">
                            <button type="submit" class="btn-adicionar-carrinho">Adicionar ao Carrinho</button>
                        </form>
                    </div>
                </div>

                <div class="home">
                <img src="../img/6.jpeg" alt="Jaqueta Colorida">
                    <div class="home-descricao">
                        <h5>Jaqueta Tayday</h5>
                        <p>Tamanho Único</p>
                        <p>R$ 249,00</p>
                        <form action="adicionar_ao_carrinho.php" method="POST">
                            <input type="hidden" name="item" value="Jaqueta Colorida">
                            <input type="hidden" name="preco" value="249,00">
                            <button type="submit" class="btn-adicionar-carrinho">Adicionar ao Carrinho</button>
                        </form>
                    </div>
                </div>
        </div>

   
        <br>
         <!-- Finalizar compra -->
         <div class="text-center">
            <a href="finalizar_compra.php" class="btn-finalizar">Finalizar Compra</a>
        </div>
    </div>
    <br><br>  <br><br><br>

<div id="section2" class="container-fluid bg-warning" style="padding:100px 20px;">
   
    <h1>Sobre nós</h1>
    <!--historia-->
    <p><br>Sempre acreditei que a roupa tem o poder de transformar e, ao longo dos anos vi como uma peça bem feita e personalizada podia elevar a autoestima das pessoas. Dessa forma, muitas clientes chegavam ao ateliê inseguras e buscando algo que as fizesse se sentir mais bonitas e confiantes. <br>Com "Sua Medida", busco criar roupas que valorizem a individualidade de cada cliente, realçando seus pontos fortes e disfarçando o que elas não gostam. A cada peça entregue, a alegria e a gratidão das clientes me motivam a continuar. A sustentabilidade se tornou parte do meu processo, pois acredito que cuidar do meio ambiente também é cuidar de nós mesmos.</p>
</div>




    <!-- Rodapé da página -->
    <footer>
    <div class="footer-container">
        <div class="footer-section">
            <!-- Mapa do endereço -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3661.827625287934!2d-46.32479342518252!3d-23.3944523554805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce87785706619d%3A0x32fab1c5bd6fe009!2sSua%20Medida%20Ateli%C3%AA%20de%20Costura!5e0!3m2!1spt-BR!2sbr!4v1724029747272!5m2!1spt-BR!2sbr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="footer-section">
            <h4>Início</h4>
            <br><br><br>
            <ul class="navbar-nav">
                <li class="nav-item">
        <center> <a class="nav-link" href="#section1">Roupas</a><center>
                </li>
                <li class="nav-item">
        <center> <a class="nav-link" href="#section2">Sobre nós</a><center>
                </li>
                <li class="nav-item">
        <center> <a class="nav-link" href="#section3">Cadastre-se</a><center>
                </li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Informações</h4>
            <br><br><br>
            <ul>
                <li> Sua Medida, transforma roupas personalizadas que refletem seu estilo. Nossa equipe dedicada cria peças com qualidade e criatividade, valorizando o processo artesanal e os detalhes que fazem a diferença. Aqui, seu estilo é a nossa inspiração. </li>
            </ul>
        </div>   
        <div class="footer-section social-media">
            <div class="footer-section"> 
                <h4>Contato</h4>
                <br><br><br>
                <a href="https://www.instagram.com/suamedidaatelie?igsh=MXF2ODNwNTl4cXRpNQ=="><i> <img src="../img/insta.jpeg"> </i></a>
                <a href="https://wa.me/5511953004751" target="_blank" class="btn-whatsapp"><i> <img src="../img/wpp.jpg"> </i></a>
            </div>
        </div>    
    </div> <!-- Fim do footer-container -->

    <div class="footer-copyright">
        &copy; 2024 Sua Medida - Ateliê de costura
    </div>
</footer>


</body>
</html>