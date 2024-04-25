<?php 
session_start();
if (!isset($_SESSION['email']) and !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['usuario']);
    unset($_SESSION['id']);
    unset($_SESSION);
    header("Location: ./../index.php");
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado</title>
    <link rel="stylesheet" href="./../css/mercado.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./../css/menuHome.css">
    <script src="./../javascript/menuHome.js" defer></script>
    <!-- <script src="./../javascript/loja.js" defer></script> -->
</head>
<body>
    <div id="fade2" class="hide"></div>
    <div id="modal-creditos" class="hide">
        <div class="comprar">
            <h2>Em breve...</h2>
        </div>
        <div class="receber">
            <div class="header">
                <h2>Assista para ganhar créditos</h2>
            </div>
            <div class="content">
                <form action="./../php/receberCredito.php" method="POST">
                    <input type="submit" name="submit-receber" value="Assistir">
                </form>
            </div>
        </div>
    </div>
    <header>
        <nav>
            <div class="ir-index">
                <h1>
                    <a href="./../index.php"><img src="./../image/index/vs.png" alt="Ir para a página inicial"></a>
                </h1>
            </div>
            <div class="menus">
                <ul>
                    <li><a href="./home.php" class="roxo">Introdução</a></li>
                    <li><a href="./inventario.php" class="verde">Inventário</a></li>
                    <li><a href="./mercado.php" class="roxo">Mercado</a></li>
                    <li><a href="./loja.php" class="verde">Loja</a></li>
                </ul>
            </div>
            <div class="op">
                <div class="saldo" id="credito">
                    <p>Créditos: <?php echo $_SESSION['creditos']; ?></p>
                </div>
                <div class="interacoes-conta">
                    <a href="./../php/logout.php">Sair</a>
                </div>
            </div>
        </nav>
    </header>
    
    <main>
        <h2>Coming Soon</h2>
    </main>

    <footer id="footer">
        <div class="footer-contacts">
            <div class="github">
                <a href="https://github.com/ImprovedSS" class="footer-link" target="_blank">
                    <div class="footer-title">
                        Github
                    </div>
                    <div class="footer-icon">
                        <i class="fa-brands fa-github"></i>
                    </div>
                </a>
            </div>

            <div class="linkedin">
                <a href="https://www.linkedin.com/in/flavio-filho-00aa0523b/" class="footer-link" target="_blank">
                    <div class="footer-title">
                        LinkedIn
                    </div>
                    <div class="footer-icon">
                        <i class="fa-brands fa-linkedin"></i>
                    </div>
                </a>
            </div>

            <div class="whatsapp">
                <a href="https://wa.me/5534993319401" class="footer-link" target="_blank">
                    <div class="footer-title">
                        WhatsApp
                    </div>
                    <div class="footer-icon">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="footer-copyright">
            &#169 2024 Todos os direitos reservados.
        </div>
    </footer>
    
</body>
</html>