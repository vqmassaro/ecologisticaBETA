<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="../css/bulmaviewuser.css">
</head>

<body>
    <main class="section">
        <h2 class="title is-2 has-text-centered">CONSULTA E MANIPULAÇÃO DE DADOS: USUÁRIOS</h2>

        <div class="container is-fluid">
            <table class="table is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>CNH</th>
                        <th>TELEFONE</th>
                        <th>EMAIL</th>
                        <th>RUA</th>
                        <th>Nº</th>
                        <th>BAIRRO</th>
                        <th>CIDADE</th>
                        <!--<th>SENHA</th>-->
                        <th>EDITAR</th>
                        <th>EXCLUIR</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require_once("./view-usuariobd.php");

                    if (isset($totalRegistros) && $totalRegistros > 0) {
                        foreach ($dados as $linha) {
                    ?>
                            <tr>
                                <td><?= $linha["id_usuario"]; ?></td>
                                <td><?= $linha["nome_usuario"]; ?></td>
                                <td><?= $linha["cnh"]; ?></td>
                                <td><?= $linha["telefone"]; ?></td>
                                <td><?= $linha["email"]; ?></td>
                                <td><?= $linha["logradouro"]; ?></td>
                                <td><?= $linha["numero"]; ?></td>
                                <td><?= $linha["nome_bairro"]; ?></td>
                                <td><?= $linha["nome_cidade"]; ?></td>
                                <!--<td><?= $linha["senha"]; ?></td>-->
                                <td>
                                    <a href="./atu-usuario.php?id=<?= $linha['id_usuario']; ?>">
                                        <img src='../img/img-icon/icons/atualizar.png' width="30px" alt="Editar" title="Editar registro">
                                    </a>
                                </td>
                                <td>
                                    <a href="./exc-usuario.php?id=<?= $linha['id_usuario']; ?>">
                                        <img src='../img-icon/icons/lixo.png' alt="Deletar" title="Apagar usuário">
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Botões de ação -->
        <div class="buttons is-centered">
            <button class="button is-link" onclick="javascript:history.go(-1);">VOLTAR</button>
        </div>
    </main>
</body>

</html>
