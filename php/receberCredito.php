<?php
if (isset($_POST['submit-receber'])) {
    require_once "./conexao.php";
    session_start();
    $_SESSION['creditos'] += 10;

    $sql_code = mysqli_query($mysqli, "UPDATE Usuarios SET creditos = $_SESSION[creditos] WHERE id = $_SESSION[id]");

    header("Location: ./../accountPage/loja.php");
} else {
    header("Location: ./../accountPage/loja.php");
};


?>