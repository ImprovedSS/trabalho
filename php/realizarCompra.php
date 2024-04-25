<?php
if (isset($_POST['submit-buy'])) {
    require_once "./conexao.php";
    session_start();

    // fazer secção de cartas ganhadas para falar para o usuário
    $_SESSION['ganhadas_comum'] = 0;
    $_SESSION['ganhadas_rara'] = 0;
    $_SESSION['ganhadas_epica'] = 0;
    $_SESSION['ganhadas_lendaria'] = 0;

    // pegando valores das quantidades de cartas
    $sql_code = "SELECT * FROM Relacoes WHERE carta_id = 1 and inventario_id = $_SESSION[inventario]";
    $search = $mysqli->query($sql_code);
    $dados = $search->fetch_assoc();
    $_SESSION['quantidade_carta_comum'] = $dados['quantidade_carta'];
    
    $sql_code = "SELECT * FROM Relacoes WHERE carta_id = 2 and inventario_id = $_SESSION[inventario]";
    $search = $mysqli->query($sql_code);
    $dados = $search->fetch_assoc();
    $_SESSION['quantidade_carta_rara'] = $dados['quantidade_carta'];
    
    $sql_code = "SELECT * FROM Relacoes WHERE carta_id = 3 and inventario_id = $_SESSION[inventario]";
    $search = $mysqli->query($sql_code);
    $dados = $search->fetch_assoc();
    $_SESSION['quantidade_carta_epica'] = $dados['quantidade_carta'];
    
    $sql_code = "SELECT * FROM Relacoes WHERE carta_id = 4 and inventario_id = $_SESSION[inventario]";
    $search = $mysqli->query($sql_code);
    $dados = $search->fetch_assoc();
    $_SESSION['quantidade_carta_lendaria'] = $dados['quantidade_carta'];

    $pacote_id = $_POST['id'];
    $sql_code = "SELECT * FROM Pacotes WHERE id = $pacote_id";
    $search = $mysqli->query($sql_code);
    $dados = $search->fetch_assoc();
    $preco = $dados['preco'];
    $chance_comum = $dados['chance_comum'];
    $chance_rara = $dados['chance_rara'];
    $chance_epica = $dados['chance_epica'];
    $chance_lendaria = $dados['chance_lendaria'];
    if ($preco <= $_SESSION['creditos']) {
        $_SESSION['creditos'] -= $preco;
        $sql_code = mysqli_query($mysqli, "UPDATE Usuarios SET creditos = $_SESSION[creditos] WHERE id = $_SESSION[id]");
        for($i = 0; $i < 4; $i++) {
            $sorteio = mt_rand(1, 100);
            if($sorteio <= $chance_lendaria) {
                $_SESSION['quantidade_carta_lendaria'] += 1;
                $_SESSION['ganhadas_lendaria'] += 1;
                $sql_code = mysqli_query($mysqli, "UPDATE Relacoes SET quantidade_carta = $_SESSION[quantidade_carta_lendaria] WHERE carta_id = 4 and inventario_id = $_SESSION[inventario]");
            } else if ($sorteio <= $chance_epica) {
                $_SESSION['quantidade_carta_epica'] += 1;
                $_SESSION['ganhadas_epica'] += 1;
                $sql_code = mysqli_query($mysqli, "UPDATE Relacoes SET quantidade_carta = $_SESSION[quantidade_carta_epica] WHERE carta_id = 3 and inventario_id = $_SESSION[inventario]");
            } else if ($sorteio <= $chance_rara) {
                $_SESSION['quantidade_carta_rara'] += 1;
                $_SESSION['ganhadas_rara'] += 1;
                $sql_code = mysqli_query($mysqli, "UPDATE Relacoes SET quantidade_carta = $_SESSION[quantidade_carta_rara] WHERE carta_id = 2 and inventario_id = $_SESSION[inventario]");
            } else {
                $_SESSION['quantidade_carta_comum'] += 1;
                $_SESSION['ganhadas_comum'] += 1;
                $sql_code = mysqli_query($mysqli, "UPDATE Relacoes SET quantidade_carta = $_SESSION[quantidade_carta_comum] WHERE carta_id = 1 and inventario_id = $_SESSION[inventario]");
            };
            $_SESSION['ganhadas_total'] = $_SESSION['ganhadas_comum'] + $_SESSION['ganhadas_rara'] + $_SESSION['ganhadas_epica'] + $_SESSION['ganhadas_lendaria'];
            header("Location: ./../accountPage/loja.php");
        };
    } else {
        header("Location: ./../accountPage/loja.php");
    $_SESSION['ganhadas_total'] = -1;

    };
    
} else {
    $_SESSION['ganhadas_total'] = 0;
    header("Location: ./../accountPage/loja.php");
};


?>