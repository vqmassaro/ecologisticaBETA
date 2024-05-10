<?php
require_once("../_conexao.php");

try {
    $SQL = "
        SELECT 
            usuario.id_usuario, usuario.nome as nome_usuario, usuario.cnh, usuario.telefone, usuario.email, usuario.senha, 
            endereco.id_endereco, endereco.logradouro, endereco.numero, endereco.cep, 
            bairro.id_bairro, bairro.nome as nome_bairro, 
            cidade.id_cidade, cidade.nome as nome_cidade 
        FROM 
            usuario, endereco, bairro, cidade 
        WHERE 
            usuario.id_usuario = endereco.id_usuario 
            AND endereco.id_bairro = bairro.id_bairro 
            AND endereco.id_cidade = cidade.id_cidade 
        LIMIT 0, 25
    ";

    $dadosSelecionados = $conexao->query($SQL);

    $dados = $dadosSelecionados->fetchAll();

    $totalRegistros = $dadosSelecionados->rowCount();
    //print_r($totalRegistros);
} catch (PDOException $erro) {
    echo("Entre em contato com o Administrador!");
}
?>
