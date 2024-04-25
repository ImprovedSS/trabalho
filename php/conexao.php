<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "login";

$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
// $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);

// if ($mysqli->error) {
//     echo "Falha ao conectar com o banco de dados: $mysqli->error";
// };

?>