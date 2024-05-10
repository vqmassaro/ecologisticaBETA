<?php
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

require_once("../_conexao.php");
try {
    $consultaSQL = "SELECT usuario.id_usuario, usuario.nome as nome, usuario.cnh, usuario.telefone, usuario.email, usuario.senha,
        endereco.logradouro as rua, endereco.numero, endereco.cep,
        bairro.nome as bairro,
        cidade.nome as cidade
FROM  ecologisticabeta.usuario, ecologisticabeta.endereco, ecologisticabeta.bairro, ecologisticabeta.cidade
WHERE usuario.id_usuario = :id
AND usuario.id_usuario = endereco.id_usuario
AND endereco.id_bairro = bairro.id_bairro
AND endereco.id_cidade = cidade.id_cidade
LIMIT 0, 25;
";

    $comandoSQL = $conexao->prepare($consultaSQL);
    $comandoSQL->bindParam(":id", $id);
    $comandoSQL->execute();
    $resultado = $comandoSQL->fetch(PDO::FETCH_ASSOC);
    
    // DEPURANDO
    // var_dump($resultado);
    // print_r($resultado);
} catch (PDOException $erro) {
    echo ("Entre em contato com o Administrador.");
}
