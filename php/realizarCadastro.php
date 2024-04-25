<?php 

require_once "./conexao.php";

$usuario = $_POST["usuario-cadastro"];
$email = $_POST["email-cadastro"];
$senha = $_POST["senha-cadastro"];

$sql_code = mysqli_query($mysqli, "INSERT INTO Usuarios(usuario, email, senha, creditos) VALUES ('$usuario', '$email', '$senha', 0)");

$sql_code2 = "SELECT * FROM Usuarios WHERE email = '$email' and senha = '$senha'";
$search = $mysqli->query($sql_code2);
$dados = $search->fetch_assoc();
$usuario_id = $dados['id'];

$sql_code3 = mysqli_query($mysqli, "INSERT INTO Inventario(usuario_id)
VALUES ($usuario_id)");

$sql_code4 = "SELECT * FROM Inventario WHERE usuario_id = '$usuario_id'";
$search = $mysqli->query($sql_code4);
$dados = $search->fetch_assoc();
$inventario_id = $dados['id'];

$sql_code5 = mysqli_query($mysqli, "INSERT INTO Relacoes(inventario_id, carta_id, quantidade_carta)
VALUES
    ($inventario_id, 1, 0),
    ($inventario_id, 2, 0),
    ($inventario_id, 3, 0),
    ($inventario_id, 4, 0)");

header("Location: ./../index.php");
exit;

?>