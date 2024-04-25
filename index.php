<?php

require_once "./php/conexao.php";
session_start();


?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plants Vs. Zombies</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/media.css">
    <script src="./javascript/two.js" defer></script>
    <script src="./javascript/modal.js" defer></script>
    <script src="./javascript/validate.js" defer></script>
</head>

<body>
    <section id="modal-interaction">
        <div id="fade" class="hide"></div>
        <div id="fade2" class="hide"></div>
        <div id="modal" class="hide">
            <div class="modal-header">
                <h2>Login</h2>
                <button id="btn-fechar">Fechar</button>
            </div>
            <div class="modal-content">
                <form action="./php/verificarConta.php" id="form-entrar" method="POST">
                    <div class="modal-input">
                        <input type="email" class="modal-input-campo" name="email" placeholder="Email" autocomplete="off" required> 
                        <div class="modal-input-erro">
                            <p>Insira um email válido.</p>
                        </div>
                    </div>
                    <div class="modal-input modal-input-password">
                        <input type="password" class="modal-input-campo" name="senha" placeholder="Senha" autocomplete="off" id="modal-input-password" required>
                        <i class="fa-solid fa-eye" id="modal-btn-password"></i>
                        <div class="modal-input-erro">
                            <p>Insira uma senha com no mínimo 8 caracteres.</p>
                        </div>
                    </div>
                    <div class="modal-submit-btn">
                        <input type="submit" name="entrar-submit" value="Entrar">
                    </div>
                    <div class="modal-esqueceu">
                        <a href="">Esqueceu sua senha?</a>
                    </div>
                    <div class="modal-divisao">
                        <hr>
                    </div>
                    <div class="modal-ir-cadastro">
                        <p>Ainda não tem uma conta? <span id="btn-ir-cadastrar">Cadastrar-se</span></p>
                    </div>
                </form>
            </div>
        </div>
        <div id="modal-cadastro" class="hide">
            <div class="modal-header-cadastro">
                <h2>Cadastro</h2>
                <button id="btn-fechar-cadastro">Fechar</button>
            </div>
            <div class="modal-content-cadastro">
                <form action="./php/realizarCadastro.php" id="form-cadastrar" method="POST" novalidate>
                    <div class="modal-cadastro-input">
                        <input type="text" class="modal-cadastro-input-campo" name="usuario-cadastro" placeholder="Usuário" id="cadastro-usuario" autocomplete="off" onblur="validateCadastroUsuario()" required>
                        <div class="modal-cadastro-erro-usuario modal-cadastro-input-erro">
                            <p class="two-lines"><i class="fa-solid fa-circle list-icon"></i>Insira no mínimo 2 caracteres. São permitidos: *_. </p>
                        </div>
                    </div>
                    <div class="modal-cadastro-input">
                        <input type="email" class="modal-cadastro-input-campo" name="email-cadastro" placeholder="Email" id="cadastro-email" autocomplete="off" onblur="validateCadastroEmail()" required>
                        <div class="modal-cadastro-erro-email modal-cadastro-input-erro">
                            <p class="one-line"><i class="fa-solid fa-circle list-icon"></i> Insira um email válido.</p>
                        </div>
                    </div>
                    <div class="modal-cadastro-input modal-input-password">
                        <input type="password" class="modal-cadastro-input-campo" name="senha-cadastro" placeholder="Senha" id="cadastro-senha" autocomplete="off" onblur="validateCadastroSenha()" required>
                        <i class="fa-solid fa-eye pass-eye" id="btn-cadastro-senha"></i>
                        <div class="modal-cadastro-erro-senha modal-cadastro-input-erro">
                            <p class="modal-cadastro-erro-senha-item one-line" id="senha-item1"><i class="fa-solid fa-circle list-icon"></i>A senha deve conter no mínimo 8 caracteres.</p>
                            <p class="modal-cadastro-erro-senha-item two-lines" id="senha-item3"><i class="fa-solid fa-circle list-icon"></i>A senha deve conter no mínimo uma letra maiúscula.</p>
                            <p class="modal-cadastro-erro-senha-item two-lines" id="senha-item2"><i class="fa-solid fa-circle list-icon"></i>A senha deve conter no mínimo uma letra minúscula.</p>
                            <p class="modal-cadastro-erro-senha-item two-lines" id="senha-item4"><i class="fa-solid fa-circle list-icon"></i>A senha deve conter no mínimo um caractere especial: (*_.). </p>
                            <p class="modal-cadastro-erro-senha-item one-line" id="senha-item5"><i class="fa-solid fa-circle list-icon"></i>A senha deve conter no mínimo um número.<p>
                            <p class="modal-cadastro-erro-senha-item one-line" id="senha-item6"><i class="fa-solid fa-circle list-icon"></i>A senha não pode conter espaços.</p>
                        </div>
                    </div>
                    <div class="modal-cadastro-input modal-input-password">
                        <input type="password" class="modal-cadastro-input-campo" name="confirmar-senha-cadastro" placeholder="Confirmar Senha" id="cadastro-confirmar-senha" autocomplete="off" onblur="validateCadastroConfirmarSenha()" required>
                        <i class="fa-solid fa-eye pass-eye" id="btn-cadastro-confirmar-senha"></i>
                        <div class="modal-cadastro-erro-confirmar-senha modal-cadastro-input-erro">
                            <p class="one-line"><i class="fa-solid fa-circle list-icon"></i>As senhas devem ser compatíveis.</p>
                        </div>
                    </div>
                    <div class="modal-submit-btn-cadastro">
                        <input type="submit" name="cadastrar-submit" value="Cadastrar">
                    </div>
                    <div class="modal-ir-entrar">
                        <p> Já tem uma conta? <span id="btn-ir-entrar">Entrar</span></p>
                    </div>
    
                </form>
    
            </div>
        </div>
    </section>

    <header>
        <section class="nav-menu" id="menu">
            <nav>
                <div class="menu">
                    <div class="menu-left">
                        <ul>
                            <li><a href="#jogos" id="btn-jogos">Jogos</a></li>
                            <li><a href="#resumo">Resumo</a></li>
                        </ul>
                    </div>
    
                    <div class="menu-center">
                        <h1>
                            <ul>
                                <li><a href="./plants.html"><img src="./image/index/plants.png" alt="Menu das Plantas"></a></li>
                                <li id="vs-li"><a href="./index.html"><img src="./image/index/vs.png" alt="Menu inicial" id="vs-img"></a></li>
                                <li><a href="./zombies.html"><img src="./image/index/zombies.png" alt="Menu dos Zumbis"></a></li>
                            </ul>
                        </h1>
                    </div>
    
                    <div class="menu-right">
                        <ul>
                            <li><a href="#historia">História</a></li>
                            <li><button id="btn-entrar">Entrar</button></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
    </header>

    <main>
        <section class="img-principal">
            <img src="./image/index/plantsvszombie.png" alt="Imagem-do-jogo-plants-vs-zombies">
        </section>
        <a href="#menu" id="a-menu">
            <div class="btn-restart" id="btn-restart" title="Ir para cima" onclick="sumirRestart()">
                <i class="fa-solid fa-caret-up"></i>
            </div>
        </a>
        <a href="#footer" id="a-footer">
            <div class="btn-bottom" id="btn-bottom" title="Ir para baixo" onclick="sumirBottom()">
                <i class="fa-solid fa-caret-down"></i>
            </div>
        </a>
        <section class="resumo" id="resumo">
            <div class="resumo-title">
                <h2>
                    RESUMO
                </h2>
            </div>
            <div class="resumo-top">
                <div class="resumo-top-left">
                    <p>
                        A franquia de Plants vs. Zombies surgiu no ano de 2009 através do jogo "Plants vs. Zombies", um tower defense de estratégia desenvolvido pela então pouco conhecida, PopCap Games, que futuramente viria a se tornar na temporada 2010-2011 uma das maiores empresas de jogos do mundo, chegando ao ponto de ser comprada pela EA Games por cerca de $750.000.000(setecentos e cinquenta milhões de dólares) nessa mesma temporada.
                    </p>
                </div>

                <div class="resumo-top-right">
                    <img src="./image/index/resumo1.jpg" alt="Capa-do-jogo-Plants-vs-Zombies" width="600px" height="500px">
                </div>
            </div>

            <div class="resumo-center">
                <div class="resumo-center-left">
                    <img src="./image/index/resumo2.jpg" alt="">
                </div>

                <div class="resumo-center-right">
                    <p>
                        O jogo foi aclamado pela crítica e indicado a vários prêmios, chegando a ganhar o GOTY(Game Of The Year) do ano de 2010, prêmio esse, considerado por muitos o maior de todos. A trama consiste no fato do jogador estar em um apocalipse zumbi e ter que sobreviver a diversas hordas de mortos-vivos. Para defender sua casa, o jogador deve utilizar diversas plantas fornecidas por seu vizinho misterioso, coletando a energia do jogo(sol) para plantá-las. 5 torres(cortadores de grama) devem ser defendidos, cada um disposto em uma linha diferente que precisa ser protegida, para evitar que cérebros sejam comidos.
                    </p>
                </div>
            </div>

            <div class="resumo-bot">
                <div class="resumo-bot-left">
                    <p>
                        Possuindo uma jogabilidade simples e dinâmica, o jogo encantou a todos do mundo, se tornando uma das mais amadas franquias de jogos, de modo que futuramente recebesse uma história em quadrinhos(HQ), duas continuações do primeiro jogo de Tower defense(Plants vs. Zombies 2: It's about time, Plants vs. Zombies 3: Welcome to Zomburbia), três jogos de tiro em terceira pessoas(Plants vs. Zombies: Garden Warfare, Plants vs. Zombies: Garden Warfare 2, Plants vs. Zombies: Battle for Neighborville) e dois spin-offs: um card game(Plants vs. Zombies: Heroes) e um tower defense lançado exclusivamente no facebook(Plants vs. Zombies: Adventures).
                    </p>
                </div>

                <div class="resumo-bot-right">
                    <img src="./image/index/resumo3.jpg" alt="">
                </div>
            </div>
        </section>

        <section class="historia" id="historia">
            <div class="historia-title">
                <h2>
                    HISTÓRIA
                </h2>
            </div>

            <div class="paragrafos">
                <div class="p1">
                    <p>
                        <span>T</span>udo começou com uma competição científica, onde dois grandes cientistas estavam competindo provar quem era o melhor. Dave, mais conhecido como Dave "Doidão" por sua loucura, havia criado plantas que se comunicavam, atiravam e dançavam. Edgar, mais conhecido como "Dr. Zumbão" pelo que viria a se tornar futuramente, tinha descoberto um elixir da ressurreição que poderia trazer qualquer coisa de volta à vida. Então, determinado a provar sua fórmula, ele ocasionou sua própria morte e injetou o elixir em seu sangue, ressuscitando com uma aparência "zumbificada" e uma maior aptidão cerebral.
                    </p>
                </div>
    
                <div class="p2">
                    <p>
                        <span>P</span>orém, mesmo com sua incrível descoberta, Edgar perde para Dave, ficando indignado com as pessoas que não acharam o seu elixir da ressurreição melhor do que plantas que dançavam. Furioso, então, ele decide se vingar de toda a população, alterando a fórmula da ressurreição e a transformando em uma fumaça que "zumbificaria" a todos, de modo que perdessem sua capacidade cognitiva e só desejassem servir ao Edgar e comer cérebros.
                    </p>
    
                </div>
    
                <div class="p3">
                    <p>
                        <span>D</span>essa maneira se inicia a batalha entre Plantas contra Zumbis, um reflexo de Dave contra Edgar, que acontece a mais de milênios e já aconteceu no futuro. Ficou curioso? Vá jogar os jogos e descubra os maiores mistérios dessa franquia, tais como, por que o Dave ficou "Doidão"? 
                    </p>
                </div>
            </div>
        </section>

        <section class="convite">
            <div class="convite-title">
                <h2 class="green">
                    Interessado?
                </h2>
                <h2 class="purple">
                    Explore!
                </h2>
                
            </div>
            <div class="convite-redirecionamento">
                <div class="redirecionamento-jogos">
                    <div class="content-redirecionamento-jogos">
                        <p>
                            Conheça nossos jogos!
                        </p>
                    </div>

                    <a href="#jogos" class="btn-redirecionamento-jogos">
                        Jogar >
                    </a>
                </div>

    
                <div class="redirecionamento-entrar">
                    <div class="content-redirecionamento-entrar">   
                        <p>
                            Colecione cards!
                        </p>
                    </div>
    
                    <div class="btn-redirecionamento-entrar" id="btn-redirecionamento-entrar">
                        Colecionar >
                    </div>
                </div>
            </div>
        </section>

        <section class="jogos" id="jogos">
            <div class="jogos-title">
                <h2>
                    JOGOS   
                </h2>
            </div>

            <div class="jogos-content">
                <div class="row1">
                    <div class="column1">
                        <a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies" target="_blank">
                            <div class="box-image">
                                <img class="icon-back" src="./image/icons/back/pvzicon.jpg" alt="Ícone do jogo Plants vs. Zombies">
                                <div class="box-image-gradient"></div>
                                <div class="box-image-content">
                                    <div class="box-image-content-site"><a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies" target="_blank">Site Oficial</a> <hr noshade size="1"></div>
                                    <div class="box-image-content-sup"><a href="https://help.ea.com/br/help-top-issues/?product=plants-vs-zombies" target="_blank">Suporte</a> <hr noshade size="1"></div>
                                </div>
                                <img id="front-pvz-icon" class="icon-front" src="./image/icons/front/pvzicon.png" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="column2">
                        <a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies-2" target="_blank">
                            <div class="box-image">
                                <img class="icon-back" src="./image/icons/back/pvz2icon.jpg" alt="Ícone do jogo Plants vs. Zombies 2: It's about time">
                                <div class="box-image-gradient"></div>
                                <div class="box-image-content">
                                    <div class="box-image-content-site"><a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies-2" target="_blank">Site Oficial</a> <hr noshade size="1"></div>
                                    <div class="box-image-content-sup"><a href="https://help.ea.com/br/help-top-issues/?product=plants-vs-zombies-2" target="_blank">Suporte</a> <hr noshade size="1"></div>
                                </div>
                                <img id="front-pvz2-icon"class="icon-front" src="./image/icons/front/pvz2icon.png" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="column3">
                        <a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies-3" target="_blank">
                            <div class="box-image">
                                <img class="icon-back" src="./image/icons/back/pvz3icon.jpg" alt="Ícone do jogo Plants vs. Zombies 3: Welcome to Zomburbia">
                                <div class="box-image-gradient"></div>
                                <div class="box-image-content">
                                    <div class="box-image-content-site"><a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies-3" target="_blank">Site Oficial</a> <hr noshade size="1"></div>
                                    <div class="box-image-content-sup"><a href="https://answers.ea.com/t5/Plants-vs-Zombies-3/ct-p/plants-vs-zombies-3-en" target="_blank">Suporte</a> <hr noshade size="1"></div>
                                </div>
                                <img id="front-pvz3-icon" class="icon-front" src="./image/icons/front/pvz3icon.png" alt="">
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row2">
                    <div class="column1">
                        <a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies-garden-warfare" target="_blank">
                            <div class="box-image">
                                <img class="icon-back" src="./image/icons/back/pvzgwicon.jpg" alt="Ícone do jogo Plants vs. Zombies: Garden Warfare">
                                <div class="box-image-gradient"></div>
                                <div class="box-image-content">
                                    <div class="box-image-content-site"><a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies-garden-warfare" target="_blank">Site Oficial</a> <hr noshade size="1"></div>
                                    <div class="box-image-content-sup"><a href="https://help.ea.com/br/help-top-issues/?product=plants-vs-zombies-garden-warfare" target="_blank">Suporte</a> <hr noshade size="1"></div>
                                </div>
                                <img id="front-pvzgw-icon" class="icon-front" src="./image/icons/front/pvzgwicon.png" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="column2">
                        <a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies-garden-warfare-2" target="_blank">
                            <div class="box-image">
                                <img class="icon-back" src="./image/icons/back/pvzgw2icon.jpg" alt="Ícone do jogo Plants vs. Zombies: Garden Warfare 2">
                                <div class="box-image-gradient"></div>
                                <div class="box-image-content">
                                    <div class="box-image-content-site"><a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies-garden-warfare-2" target="_blank">Site Oficial</a> <hr noshade size="1"></div>
                                    <div class="box-image-content-sup"><a href="https://help.ea.com/br/help-top-issues/?product=plants-vs-zombies-garden-warfare-2" target="_blank">Suporte</a> <hr noshade size="1"></div>
                                </div>
                                <img id="front-pvzgw2-icon" class="icon-front" src="./image/icons/front/pvzgw2icon.png" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="column3">
                        <a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies-battle-for-neighborville" target="_blank">
                            <div class="box-image">
                                <img class="icon-back" src="./image/icons/back/pvzbfnicon.jpg" alt="Ícone do jogo Plants vs. Zombies: Battle for Neighborville">
                                <div class="box-image-gradient"></div>
                                <div class="box-image-content">
                                    <div class="box-image-content-site"><a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies-battle-for-neighborville" target="_blank">Site Oficial</a> <hr noshade size="1"></div>
                                    <div class="box-image-content-sup"><a href="https://help.ea.com/br/help-top-issues/?product=plants-vs-zombies-battle-for-neighborville" target="_blank">Suporte</a> <hr noshade size="1"></div>
                                </div>
                                <img id="front-pvzbfn-icon" class="icon-front" src="./image/icons/front/pvzbfnicon.png" alt="">
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row3">
                    <div class="column1">
                        <a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies-heroes" target="_blank">
                            <div class="box-image">
                                <img class="icon-back" src="./image/icons/back/pvzheroesicon.jpg" alt="Ícone do jogo Plants vs. Zombies: Heroes">
                                <div class="box-image-gradient"></div>
                                <div class="box-image-content">
                                    <div class="box-image-content-site"><a href="https://www.ea.com/pt-br/games/plants-vs-zombies/plants-vs-zombies-heroes" target="_blank">Site Oficial</a> <hr noshade size="1"></div>
                                    <div class="box-image-content-sup"><a href="https://help.ea.com/br/help-top-issues/?product=plants-vs-zombies-heroes" target="_blank">Suporte</a> <hr noshade size="1"></div>
                                </div>
                                <img id="front-pvzheroes-icon" class="icon-front" src="./image/icons/front/pvzheroesicon.png" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </section>
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