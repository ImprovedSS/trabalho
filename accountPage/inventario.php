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
require_once "./../php/conexao.php";

$sql_code = "SELECT * FROM Relacoes WHERE carta_id = 1 and inventario_id = $_SESSION[inventario]";
$search = $mysqli->query($sql_code);
$dados = $search->fetch_assoc();
$_SESSION['quantidade_carta_comum'] = $dados['quantidade_carta'];
if ($_SESSION['quantidade_carta_comum'] > 0) {
    $title_sunflower = "01: Sunflower";
    $caminho_sunflower = "./../image/cards/sunflower_front.png";
    $caminho_sunflower_back = "./../image/cards/back.png";
} else {
    $title_sunflower = "??: ?????????";
    $caminho_sunflower = "./../image/cards/desconhecido.png";
    $caminho_sunflower_back = "./../image/cards/desconhecido.png";
};
    
$sql_code = "SELECT * FROM Relacoes WHERE carta_id = 2 and inventario_id = $_SESSION[inventario]";
$search = $mysqli->query($sql_code);
$dados = $search->fetch_assoc();
$_SESSION['quantidade_carta_rara'] = $dados['quantidade_carta'];
if ($_SESSION['quantidade_carta_rara'] > 0) {
    $title_peashooter = "02: Peashooter";
    $caminho_peashooter = "./../image/cards/peashooter_front.png";
    $caminho_peashooter_back = "./../image/cards/back.png";
} else {
    $title_peashooter = "??: ?????????";
    $caminho_peashooter = "./../image/cards/desconhecido.png";
    $caminho_peashooter_back = "./../image/cards/desconhecido.png";
};
    
$sql_code = "SELECT * FROM Relacoes WHERE carta_id = 3 and inventario_id = $_SESSION[inventario]";
$search = $mysqli->query($sql_code);
$dados = $search->fetch_assoc();
$_SESSION['quantidade_carta_epica'] = $dados['quantidade_carta'];
if ($_SESSION['quantidade_carta_epica'] > 0) {
    $title_wallnut = "03: Wall Nut";
    $caminho_wallnut = "./../image/cards/wallnut_front.png";
    $caminho_wallnut_back = "./../image/cards/back.png";

} else {
    $title_wallnut = "??: ?????????";
    $caminho_wallnut = "./../image/cards/desconhecido.png";
    $caminho_wallnut_back = "./../image/cards/desconhecido.png";
};
    
$sql_code = "SELECT * FROM Relacoes WHERE carta_id = 4 and inventario_id = $_SESSION[inventario]";
$search = $mysqli->query($sql_code);
$dados = $search->fetch_assoc();
$_SESSION['quantidade_carta_lendaria'] = $dados['quantidade_carta'];
if ($_SESSION['quantidade_carta_lendaria'] > 0) {
    $title_chomper = "04: Chomper";
    $caminho_chomper = "./../image/cards/chomper_front.png";
    $caminho_chomper_back = "./../image/cards/back.png";
} else {
    $title_chomper = "??: ?????????";
    $caminho_chomper = "./../image/cards/desconhecido.png";
    $caminho_chomper_back = "./../image/cards/desconhecido.png";
};

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventário</title>
    <link rel="stylesheet" href="./../css/inventario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./../css/card.css">
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
        <section id="pvz">
            <div class="title-section">
                <img src="./../image/titles/pvz.png" alt="Título Plants Vs. Zombies">
            </div>
            <div class="content-section">
                <div class="container" id="sunflower-card">
                    <div class="title-card">
                        <h4><?= $title_sunflower ?></h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="<?php echo $caminho_sunflower ?>" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="<?php echo $caminho_sunflower_back ?>" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container" id="peashooter-card">
                    <div class="title-card">
                        <h4><?= $title_peashooter ?></h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="<?php echo $caminho_peashooter ?>" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="<?php echo $caminho_peashooter_back ?>" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container" id="wallnut-card">
                    <div class="title-card">
                        <h4><?= $title_wallnut ?></h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="<?php echo $caminho_wallnut ?>" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="<?php echo $caminho_wallnut_back ?>" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container" id="chomper-card">
                    <div class="title-card">
                        <h4><?= $title_chomper ?></h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="<?php echo $caminho_chomper ?>" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="<?php echo $caminho_chomper_back ?>" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <section id="pvz2">
            <div class="title-section">
                <img src="./../image/titles/pvz2.png" alt="Título Plants Vs. Zombies2">
            </div>
            <div class="content-section">
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <section id="pvz3">
            <div class="title-section">
                <img src="./../image/titles/pvz3.png" alt="Título Plants Vs. Zombies2">
            </div>
            <div class="content-section">
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <section id="pvzgw">
            <div class="title-section">
                <img src="./../image/titles/pvzgw.png" alt="Título Plants Vs. Zombies2">
            </div>
            <div class="content-section">
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <section id="pvzgw2">
            <div class="title-section">
                <img src="./../image/titles/pvzgw2.png" alt="Título Plants Vs. Zombies2">
            </div>
            <div class="content-section">
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <section id="pvzbfn">
            <div class="title-section">
                <img src="./../image/titles/pvzbfn.png" alt="Título Plants Vs. Zombies2">
            </div>
            <div class="content-section">
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <section id="pvzheroes">
            <div class="title-section">
                <img src="./../image/titles/pvzheroes.png" alt="Título Plants Vs. Zombies2">
            </div>
            <div class="content-section">
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="title-card">
                        <h4>??:?????????</h4>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Frente do card">
                            </div>
                            <div class="card-back">
                                <img src="./../image/cards/desconhecido.png" class="card-img" alt="Costas do card">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>        
        


        <!-- <section id="pvz2">
            <header>
                <img src="" alt="">
            </header>

        </section>
        
        <section id="pvz3">
            <header>
                <img src="" alt="">
            </header>

        </section>
        
        <section id="pvzgw">
            <header>
                <img src="" alt="">
            </header>

        </section>

        <section id="pvzgw2">
            <header>
                <img src="" alt="">
            </header>

        </section>
        
        <section id="pvzbnf">
            <header>
                <img src="" alt="">
            </header>

        </section>

        <section id="pvzheroes">
            <header>
                <img src="" alt="">
            </header>

        </section> -->
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