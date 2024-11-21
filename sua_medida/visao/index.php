<?php
    include("../controladora/conexao.php");
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
    <link rel="stylesheet" href="../css/carrinho.css"> <!-- Link para o CSS externo -->
    
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
        <!-- Cabeçalho do site -->
<nav>
            <!-- Seção de navegação -->
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#section2">Sobre nós</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#section3">Cadastre-se</a>
      
              </li>
                <li class="nav-item">
                    <a class="nav-link" href="#section4">Logue-se</a>
                </li>
            </ul>
</header>

<!--seção de navegação das paginas-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top"></nav>

<div id="section1" class="container-fluid bg-success text-white" style="padding:100px 20px;">
  
  <div class="container mt-5">

        <h1> Quer fazer suas compras? Logue-se!</h1>
        <br><br><br>

        <div class="home">
                <!-- Roupas -->
                <div class="home">
                    <img src="../img/1.jpeg" alt="Cropped Listrado">
                    <div class="home-descricao">
                        <h5>Cropped Listrado</h5>
                        <p>Tamanho Único</p>
                        <p>R$ 49,90</p>
                    </div>
                </div>

                <div class="home">
                    <img src="../img/2.jpeg" alt="Cropped Branco">
                    <div class="home-descricao">
                        <h5>Cropped de botão</h5>
                        <p>Tamanho Único</p>
                        <p>R$ 59,90</p>
                    </div>
                </div>

                <div class="home">
                    <img src="../img/3.jpeg" alt="Vestido Preto">
                    <div class="home-descricao">
                        <h5>Vestido risca de giz</h5>
                        <p>Tamanho Único</p>
                        <p>R$ 139,90</p>
                    </div>
                </div>

                <div class="home">
                    <img src="../img/4.jpeg" alt="Camisa Branca">
                    <div class="home-descricao">
                        <h5>Camisa Branca</h5>
                        <p>Tamanho Único</p>
                        <p>R$ 109,90</p>
                    </div>
                </div>

                <div class="home">
                    <img src="../img/5.jpeg" alt="Jaqueta Preta">
                    <div class="home-descricao">
                        <h5>Blazer cropped</h5>
                        <p>Tamanho Único</p>
                        <p>R$ 199,99</p>
                    </div>
                </div>

                <div class="home">
                    <img src="../img/6.jpeg" alt="Jaqueta Colorida">
                    <div class="home-descricao">
                        <h5>Jaqueta Colorida</h5>
                        <p>Tamanho Único</p>
                        <p>R$ 249,00</p>
                    </div>
                </div>
        </div>

   
        <br><br><br>  <br><br><br>
    

<div id="section2" class="container-fluid bg-warning" style="padding:100px 20px;">
    <h1>Sobre nós</h1>
    <!--historia-->
    <p><br>Sempre acreditei que a roupa tem o poder de transformar e, ao longo dos anos vi como uma peça bem feita e personalizada podia elevar a autoestima das pessoas. Dessa forma, muitas clientes chegavam ao ateliê inseguras e buscando algo que as fizesse se sentir mais bonitas e confiantes. <br>Com "Sua Medida", busco criar roupas que valorizem a individualidade de cada cliente, realçando seus pontos fortes e disfarçando o que elas não gostam. A cada peça entregue, a alegria e a gratidão das clientes me motivam a continuar. A sustentabilidade se tornou parte do meu processo, pois acredito que cuidar do meio ambiente também é cuidar de nós mesmos.</p>
</>

<div id="section3" class="container-fluid bg-secondary text-white" style="padding:100px 20px;">
    <!--formulario-->
    <div class="form-cadastrar">
  <h1 class="formh1">Cadastre-se</h1>

      <form action="../controladora/processa_cadastro.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" placeholder="Digite seu nome" name="nome" required>
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Digite seu email" name="email" required>
    </div>
    <div class="mb-3">
      <label for="pwd">Senha:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Digite sua senha" name="pswd" required>
    </div>
    <button type="submit" class="btn-cadastrar">Enviar</button>
</form>
</div>
</div>
 
<div id="section4" class="container-fluid bg-secondary text-white" style="padding:100px 20px;">
<div class="form-login">
<h1 class="formh1">Logue-se</h1>

<form action="../controladora/processa_login.php" method="POST">
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="mb-3">
                <label for="pswd">Senha:</label>
                <input type="password" class="form-control" id="pswd" name="pswd" placeholder="Digite sua senha" required>
            </div>
            <button type="submit" class="btn-login">Login</button>
        
        </form>
        </div>
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
        <a class="nav-link" href="#section1">Roupas</a>
                </li>
                <li class="nav-item">
        <a class="nav-link" href="#section2">Sobre nós</a>
                </li>
                <li class="nav-item">
        <a class="nav-link" href="#section3">Cadastre-se</a>
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
                <a href="https://wa.me/5511987654321" target="_blank" class="btn-whatsapp"><i> <img src="../img/wpp.jpg"> </i></a>
            </div>
        </div>    
    </div> <!-- Fim do footer-container -->

    <div class="footer-copyright">
        &copy; 2024 Sua Medida - Ateliê de costura
    </div>
</footer>


</body>
</html>