<?php

session_start();

if (isset($_POST['entrar-submit'])) {
    require_once "./conexao.php";
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // $sql_code = mysqli_query($mysqli, "SELECT * FROM Usuarios WHERE email = '$email' and senha = '$senha'");
    $sql_code = "SELECT * FROM Usuarios WHERE email = '$email' and senha = '$senha'";
    $search = $mysqli->query($sql_code);
        
    if (mysqli_num_rows($search) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['usuario']);
        unset($_SESSION['id']);
        unset($_SESSION);
        header("Location: ./../index.php");
    } else {
        $dados = $search->fetch_assoc();
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['usuario'] = $dados['usuario'];
        $_SESSION['id'] = $dados['id'];
        $_SESSION['creditos'] = $dados['creditos'];

        $sql_code = "SELECT * FROM Inventario WHERE usuario_id = $_SESSION[id]";
        $search = $mysqli->query($sql_code);
        $dados = $search->fetch_assoc();
        $_SESSION['inventario'] = $dados['id'];

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

        $_SESSION['ganhadas_comum'] = 0;
        $_SESSION['ganhadas_rara'] = 0;
        $_SESSION['ganhadas_epica'] = 0;
        $_SESSION['ganhadas_lendaria'] = 0;
        $_SESSION['ganhadas_total'] = 0;

        header("Location: ./../accountPage/home.php");
    };
} else {
    header("Location: ./../index.php");
}

?>