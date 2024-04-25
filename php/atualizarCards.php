<?php
session_start();
if (!isset($_SESSION['email']) and !isset($_SESSION['senha'])) {
    require_once "./conexao.php";
    function atualizar($caminho) {
            global $mysqli;
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
            header("Location: $caminho");
    };
} else {
    header("Location: ./../index.php");
};