<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_usuario = filter_input(INPUT_POST, "id_usuario", FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $cnh = filter_input(INPUT_POST, "cnh", FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $rua = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_SPECIAL_CHARS);
    $numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_SPECIAL_CHARS);
    $cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_NUMBER_INT);
    $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);
    $senha = filter_input(INPUT_POST, "senha1", FILTER_SANITIZE_SPECIAL_CHARS);
    
    try {
        require_once('../_conexao.php');
        
        $conexao->beginTransaction(); // Inicia a transação
    
        // Atualização na tabela usuario
        $comandoSQLUsuario = $conexao->prepare("
            UPDATE ecologisticabeta.usuario SET
                `nome` = :nome,
                `cnh` = :cnh,
                `telefone` = :telefone,
                `email` = :email,
                `senha` = :senha
            WHERE
                `id_usuario` = :id_usuario
        ");
    
        $comandoSQLUsuario->execute(array(
            ':id_usuario' => $id_usuario,
            ':nome' => $nome,
            ':cnh' => $cnh,
            ':telefone' => $telefone,
            ':email' => $email,
            ':senha' => $senha
        ));
    
        // Atualização na tabela bairro
        $comandoSQLBairro = $conexao->prepare("
            UPDATE ecologisticabeta.bairro SET
                `nome` = :nome
            WHERE
                `id_bairro` = (SELECT `id_bairro` FROM ecologisticabeta.endereco WHERE `id_usuario` = :id_usuario)
        ");
    
        $comandoSQLBairro->execute(array(
            ':id_usuario' => $id_usuario,
            ':nome' => $bairro
        ));

        // Atualização na tabela cidade
        $comandoSQLCidade = $conexao->prepare("
            UPDATE ecologisticabeta.cidade SET
                `nome` = :nome
            WHERE
                `id_cidade` = (SELECT `id_cidade` FROM ecologisticabeta.endereco WHERE `id_usuario` = :id_usuario)
        ");
    
        $comandoSQLCidade->execute(array(
            ':id_usuario' => $id_usuario,
            ':nome' => $cidade
        ));

        // Atualização na tabela endereco
        $comandoSQLEndereco = $conexao->prepare("
            UPDATE ecologisticabeta.endereco SET
                `logradouro` = :logradouro,
                `numero` = :numero,
                `cep` = :cep
            WHERE
                `id_usuario` = :id_usuario
        ");
    
        $comandoSQLEndereco->execute(array(
            ':id_usuario' => $id_usuario,
            ':logradouro' => $rua,
            ':numero' => $numero,
            ':cep' => $cep
        ));

        // Commit da transação
        $conexao->commit();

        header('Location: ./view-usuario.php');
        exit();

    } catch (Exception $e) {
        // Rollback da transação em caso de erro
        $conexao->rollBack();
        echo "Erro ao atualizar dados: " . $e->getMessage();
    }
}
?>
