<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
    <link rel="stylesheet" href="./../css/loja.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./../css/menuHome.css">
    <script src="./../javascript/menuHome.js" defer></script>
    <script src="./../javascript/loja.js" defer></script>
    <input type="hidden" id="meta-dado" value="<?php $_SESSION['ganhadas_total'] ?>">
</head>
<body onload="verificarStatus()">
    <div id="fade" class="hide"></div>
    <div id="modal-status" class="hide">
        <div class="modal-header">
            <h2>Status</h2>
            <button id="btn-fechar-status">Fechar</button>
        </div>
        <div class="modal-content">
             <?php if($_SESSION['ganhadas_total'] >= 1): ?>
                <?php if($_SESSION['ganhadas_comum'] == 1): ?>
                    <p><?php echo $_SESSION['ganhadas_comum'] ?>x carta comum.</p>
                <?php elseif($_SESSION['ganhadas_comum'] > 1): ?>
                    <p><?php echo $_SESSION['ganhadas_comum'] ?>x cartas comuns.</p>
                <?php endif; ?>
                <?php if($_SESSION['ganhadas_rara'] == 1): ?>
                    <p><?php echo $_SESSION['ganhadas_rara'] ?>x carta rara.</p>
                <?php elseif($_SESSION['ganhadas_rara'] > 1): ?>
                    <p><?php echo $_SESSION['ganhadas_rara'] ?>x cartas raras.</p>
                <?php endif; ?>
                <?php if($_SESSION['ganhadas_epica'] == 1): ?>
                    <p><?php echo $_SESSION['ganhadas_epica'] ?>x carta épica.</p>
                <?php elseif($_SESSION['ganhadas_epica'] > 1): ?>
                    <p><?php echo $_SESSION['ganhadas_epica'] ?>x cartas épicas.</p>
                <?php endif; ?>
                <?php if($_SESSION['ganhadas_lendaria'] == 1): ?>
                    <p><?php echo $_SESSION['ganhadas_lendaria'] ?>x carta lendária.</p>
                <?php elseif($_SESSION['ganhadas_lendaria'] > 1): ?>
                    <p><?php echo $_SESSION['ganhadas_lendaria'] ?>x cartas lendárias.</p>
                <?php endif; ?>
            <?php elseif($_SESSION['ganhadas_total'] == -1):  ?>
                <p>Saldo Insuficiente.</p>
            <?php endif; ?>
        </div>
    </div>

    <div id="fade2" class="hide"></div>
    <div id="modal-creditos" class="hide">
        <div class="comprar">
            <h2>Comprar...</h2>
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
        <div class="content">
            <div class="pacote-basico pacotes">
                <div class="image">
                    <img src="./../image/cards/pacote.png" alt="Foto pacote">
                </div>
                <div class="infos">
                    Pacote Básico:
                    10 Créditos
                </div>
                <div class="buy-btn">
                    <form action="./../php/realizarCompra.php" method="POST">
                        <input type="hidden" name="id" value="1">
                        <input type="submit" class="btn" name="submit-buy" value="Comprar">
                    </form>
                </div>
            </div>
            <div class="pacote-premium pacotes">
                <div class="image">
                    <img src="./../image/cards/pacote.png" alt="Foto pacote">
                </div>
                <div class="infos">
                    Pacote Premium:
                    50 Créditos
                </div>
                <div class="buy-btn">
                    <form action="./../php/realizarCompra.php" method="POST">
                        <input type="hidden" name="id" value="2">
                        <input type="submit" class="btn" name="submit-buy" value="Comprar">
                    </form>
                </div>
            </div>
            <div class="pacote-luxo pacotes">
                <div class="image">
                    <img src="./../image/cards/pacote.png" alt="Foto pacote">    
                </div>
                <div class="infos">
                    Pacote Luxo:
                    100 Creditos
                </div>
                <div class="buy-btn">
                    <form action="./../php/realizarCompra.php" method="POST">
                        <input type="hidden" name="id" value="3">
                        <input type="submit" class="btn" name="submit-buy" value="Comprar">
                    </form>
                </div>  
            </div>
        </div>
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