<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="../css/bulmacadusuario.css">
    <link rel="icon" href="../img-icon/icons/perfil.png">
</head>
<body>
    <main>
        <section class="section">
            <div class="container">
                <h2 class="title is-2 has-text-centered">CADASTRO DE USUÁRIO</h2>
                <form action="./cad-usuariobd.php" method="POST" enctype="multipart/form-data">
                    
					<!-- NOME -->
					<div class="field">
                        <label class="label" for="nome">Nome:</label>
                        <div class="control">
                            <input class="input" 
                                   type="text"
                                   name="nome"
                                   id="nome"
                                   placeholder="Digite seu Nome">
                        </div>
                    </div>

                      <!-- CNH -->
                      <div class="field">
                        <label class="label" for="cnh">CNH:</label>
                        <div class="control">
                            <input class="input"
                                   type="text"
                                   name="cnh"
                                   id="cnh"
                                   placeholder="Informe sua CNH">
                        </div>
                    </div>

                    <!-- TELEFONE -->
                    <div class="field">
                        <label class="label" for="telefone">Telefone:</label>
                        <div class="control">
                            <input class="input"
                                   type="tel"
                                   name="telefone"
                                   id="telefone"
                                   placeholder="Digite o Telefone">
                        </div>
                    </div>

                    <!-- EMAIL -->
                    <div class="field">
                        <label class="label" for="email">E-mail:</label>
                        <div class="control">
                            <input class="input"
                                   type="email"
                                   name="email"
                                   id="email"
                                   placeholder="Digite o E-mail">
                        </div>
                    </div>
                    
                    <!-- RUA/AV -->
                    <div class="field">
                        <label class="label" for="rua">Rua/Av:</label>
                        <div class="control">
                            <input class="input" 
                                   type="text"
                                   name="rua"
                                   id="rua"
                                   placeholder="Nome da rua/av">
                        </div>
                    </div>

                    <!-- Nº RESIDÊNCIA-->
                    <div class="field">
                        <label class="label" for="numero">N°:</label>
                        <div class="control">
                            <input class="input" 
                                   type="text"
                                   name="numero"
                                   id="numero"
                                   placeholder="Digite o número">
                        </div>
                    </div>

                    <!-- CEP -->
                    <div class="field">
                        <label class="label" for="cep">CEP:</label>
                        <div class="control">
                            <input class="input" 
                                   type="text"
                                   name="cep"
                                   id="cep"
                                   placeholder="Informe seu cep">
                        </div>
                    </div>

                    <!-- BAIRRO -->
                    <div class="field">
                        <label class="label" for="bairro">Bairro:</label>
                        <div class="control">
                            <input class="input" 
                                   type="text"
                                   name="bairro"
                                   id="bairro"
                                   placeholder="Informe seu bairro">
                        </div>
                    </div>

                    <!-- CIDADE -->
                    <div class="field">
                        <label class="label" for="cidade">Cidade:</label>
                        <div class="control">
                            <input class="input" 
                                   type="text"
                                   name="cidade"
                                   id="cidade"
                                   placeholder="Informe sua cidade">
                        </div>
                    </div>                  

                   <!-- Senha -->
                <div class="row-fluid">
                    <div class="col">
                        <label for="senha1">Senha</label>
                        <input type="password" 
                            name="senha1" 
                            id="senha1"
                            placeholder="Informe uma senha com oito caracteres!">
                        <p class="senha-erro">Senhas diferentes</p>                        
                    </div>
                    
                    <div class="col">
                        <label for="senha2">Confirmação de senha</label>
                        <input type="password" 
                            name="senha2" 
                            id="senha2"
                            placeholder="Informe uma senha com oito caracteres novamente!">
                        <p class="senha-erro">Senhas diferentes</p>
                    </div>
                </div>


                        </div>
                    <!-- Botões de ação -->
                <div class="row-fluid justify-center">
                    <input type="reset" value="Voltar" onclick="javascript:history.go(-1);">
                    <input type="submit" value=" S A L V A R " disabled id="submit">
                </div>
                </form>
            </div>
        </section>
    </main>

    <script>
        let senha1 = document.querySelector("#senha1");
        let senha2 = document.querySelector("#senha2");
        let submit = document.querySelector("#submit");
        let senhaerro = document.querySelector(".senha-erro");

        function verifica(){
            if(senha1.value == senha2.value){
                senhaerro.style.display = "none";  // retira a mensagem da tela
                submit.disabled = false; // habilita o botão de enviar/SALVAR
            }
            else{
                senhaerro.style.display = "block";
                submit.disabled = true; // mantém o botão de enviar/SALVAR desabilitado
            }
        }

        // senha1.addEventListener("input", function(){
        //     verifica();
        // });

        senha2.addEventListener("input", function(){
            verifica();
        });
    </script>
</body>
</html> 
