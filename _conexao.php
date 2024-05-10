<?php
$dns = "mysql:host=localhost;dbname=ecologisticabeta;charset=utf8";
$user = "root";
$pass = "";

try {
    // Cria a conexão com o banco de dados
    $conexao = new PDO($dns, $user, $pass);
    //echo "Conexão bem sucedida!";
} catch (PDOException $erro) {
    echo "Erro ao conectar ao banco de dados: " . $erro->getMessage();
}
?>
