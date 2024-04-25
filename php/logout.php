<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['usuario']);
unset($_SESSION['id']);
unset($_SESSION);
header("Location: ./../index.php");
?>