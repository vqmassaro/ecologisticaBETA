<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
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
    
    // Criptografando a senha
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
    
    try {
        require_once('../_conexao.php');
        
        $conexao->beginTransaction(); // Inicia a transação
    
        // Inserção na tabela usuario
        $comandoSQLUsuario = $conexao->prepare("
            INSERT INTO ecologisticabeta.usuario (
                `nome`,
                `cnh`,
                `telefone`,
                `email`,
                `senha`
            ) VALUES (
                :nome,
                :cnh,
                :telefone,
                :email,
                :senha
            )
        ");
    
        $comandoSQLUsuario->execute(array(
            ':nome' => $nome,
            ':cnh' => $cnh,
            ':telefone' => $telefone,
            ':email' => $email,
            ':senha' => $senhaCriptografada
        ));
    
        $id_usuario = $conexao->lastInsertId(); // Obtém o ID do usuário inserido
    
        // Inserção na tabela bairro
        $comandoSQLBairro = $conexao->prepare("
            INSERT INTO ecologisticabeta.bairro (
                `nome`
            ) VALUES (
                :nome
            )
        ");
    
        $comandoSQLBairro->execute(array(
            ':nome' => $bairro
        ));

        $id_bairro = $conexao->lastInsertId(); // Obtém o ID do bairro inserido

        // Inserção na tabela cidade
        $comandoSQLCidade = $conexao->prepare("
            INSERT INTO ecologisticabeta.cidade (
                `nome`
            ) VALUES (
                :nome
            )
        ");
    
        $comandoSQLCidade->execute(array(
            ':nome' => $cidade
        ));
    
        $id_cidade = $conexao->lastInsertId(); // Obtém o ID da cidade inserido

        // Inserção na tabela endereco
        $comandoSQLEndereco = $conexao->prepare("
            INSERT INTO ecologisticabeta.endereco (
                `logradouro`,
                `numero`,
                `cep`,
                `id_usuario`,
                `id_bairro`,
                `id_cidade`
            ) VALUES (
                :logradouro,
                :numero,
                :cep,
                :id_usuario,
                :id_bairro,
                :id_cidade
            )
        ");
    
        $comandoSQLEndereco->execute(array(
            ':logradouro' => $rua,
            ':numero' => $numero,
            ':cep' => $cep,
            ':id_usuario' => $id_usuario,
            ':id_bairro' => $id_bairro,
            ':id_cidade' => $id_cidade
        ));

        // Commit da transação
        $conexao->commit();

        header('Location: ./view-usuario.php');
        exit();

    } catch (Exception $e) {
        // Rollback da transação em caso de erro
        $conexao->rollBack();
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}
?>
