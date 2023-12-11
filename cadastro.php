<?php
session_start(); // Inicia a sessão PHP, o que é necessário para utilizar variáveis de sessão.

$erro = ""; // Inicializa a variável de erro como uma string vazia.

// Verifica se o método de requisição é POST, o que normalmente indica que o formulário foi enviado.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos nome, email ou senha estão vazios.
    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
        $erro = "Por favor, preencha todos os campos."; // Define a mensagem de erro se algum campo estiver vazio.
    } else {
        require_once "processa_cadastro.php"; // Inclui o arquivo que processa o cadastro se todos os campos estiverem preenchidos.
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css"> <!-- Link para o arquivo CSS externo -->
    <link rel="shortcut icon" href="img/2827337.png" type="image/x-icon">
    <title>Cadastro</title>
</head>
<body>

<div class="card">
    <img src="img/Novo_Projeto-removebg-preview.png" id="logi">
    <h1>Cadastro de Usuário</h1>

    <!-- Formulário de cadastro. O action está configurado para enviar os dados para a mesma página. -->
    <div class="formulario">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Campos de nome, e-mail e senha -->
            <label for="nome">Nome:</label>
                <input  type="text" id="nome" name="nome">

                <label>Data de nascimento:</label>
                <input  class="butaozinho" type="date" id="data_nasc" name="data_nasc" required>

                <label for="email">E-mail:</label>
                <input  class="butaozinho" type="email" id="email" name="email">

                <label for="senha">Senha:</label>
                <input  class="butaozinho" type="password" id="senha" name="senha">

                <label for="confirmarsenha">Confirmar Senha:</label>
                <input  class="butaozinho" type="password" id="psenha" name="psenha">

                <label>CPF:</label></td>
                <input class="butaozinho" type="number" id="cpf" name="cpf" max="99999999999" size="30">

                <div id="sexos">
                    <label>Sexo:</label>
                    <input class="butaozinho" type="radio" name="sexo" value="M" required>Masculino
                    <input class="butaozinho" type="radio" name="sexo" value="F"required>Feminino
                </div>


                <label>Estado:</label>


                <select class="butaozinho" name="estado" id="estado" required>
                    <option value="default" selected="selected">--Selecione--</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AM">AM</option>
                    <option value="AP">AP</option>
                    <option value="CE">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                </select>

            <label>CEP:</label>
            <input class="butaozinho" type="number" id="cep" name="cep" required />

            <label>Endereço:</label>
            <input class="butaozinho" type="text" id="endereco" name="endereco" required>

            <label>Telefone para contato:</label>
            <input class="butaozinho" type="number" size="20" id="telefone" name="telefone"
                        max="99 999999999">
            <input type="submit" value="Cadastrar" class="pqp"> <!-- Botão de envio do formulário -->
        </form>
        <a href="index.php">
        <button id="pqp" style="
    width: 300px;
    height: 30px;
    border-radius: 5px;
    border: none;
    margin-top: 20px;
    background-color: #0056b3;
    color: white;
">Voltar</button>
        </a>
    </div>
    <!-- Link para visualizar cadastros -->
    <!-- <a href="visualizar_cadastros.php" class="btn">Visualizar Cadastros</a> -->

    <?php
        // Verifica se há uma mensagem de erro para exibir.
        if (!empty($erro)): ?>
            <div class="mensagem erro">
                <?php echo $erro; // Exibe a mensagem de erro ?>
            </div>
        <?php
        // Verifica se existe uma mensagem na sessão e se ela não está vazia.
        elseif (isset($_SESSION['mensagem']) && !empty($_SESSION['mensagem'])): ?>
            <div class="mensagem">
                <?php
                echo $_SESSION['mensagem']; // Exibe a mensagem da sessão.
                unset($_SESSION['mensagem']); // Limpa a mensagem da sessão.
                ?>
            </div>

<?php endif; ?>

</body>
</html>
