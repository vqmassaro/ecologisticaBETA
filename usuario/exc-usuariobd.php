<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Filtrando as informações recebidas
    $id_usuario = filter_input(INPUT_POST, "id_usuario", FILTER_SANITIZE_NUMBER_INT);

    try {
        require_once("../_conexao.php");

        // Selecionar o ID do endereço antes de excluir a tabela
        $select_endereco = $conexao->prepare("SELECT id_endereco FROM endereco WHERE id_usuario = :id_usuario");
        $select_endereco->bindParam(':id_usuario', $id_usuario);
        $select_endereco->execute();
        $id_endereco = $select_endereco->fetch(PDO::FETCH_ASSOC)['id_endereco'];

        // Excluir registros de bairro que correspondem ao endereço
        $delete_bairro = $conexao->prepare("DELETE FROM bairro WHERE id_endereco = :id_endereco");
        $delete_bairro->bindParam(':id_endereco', $id_endereco);
        $delete_bairro->execute();

        // Excluir registros de cidade que correspondem ao endereço
        $delete_cidade = $conexao->prepare("DELETE FROM cidade WHERE id_endereco = :id_endereco");
        $delete_cidade->bindParam(':id_endereco', $id_endereco);
        $delete_cidade->execute();

        // Excluir registros de endereço
        $delete_endereco = $conexao->prepare("DELETE FROM endereco WHERE id_usuario = :id_usuario");
        $delete_endereco->bindParam(':id_usuario', $id_usuario);
        $delete_endereco->execute();

        // Excluir o usuário
        $delete_usuario = $conexao->prepare("DELETE FROM usuario WHERE id_usuario = :id_usuario");
        $delete_usuario->bindParam(':id_usuario', $id_usuario);
        $delete_usuario->execute();

        // Verificar se houve sucesso na exclusão do usuário
        if ($delete_usuario->rowCount() > 0) {
            // Redirecionar para a página de visualização de usuários
            header("location:./view-usuario.php");
            exit();
        } else {
            echo "Erro ao excluir o usuário.";
        }
    } catch (PDOException $erro) {
        echo "Erro na exclusão do usuário.<br>" + $erro->getMessage();
    }
} else {
    echo "Erro no envio das informações!";
}
?>
