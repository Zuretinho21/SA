<?php
session_start(); // Inicia a sessão

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar com o banco de dados
    $servername = "localhost"; // ou o endereço do seu servidor de banco de dados
    $username = "root";    // seu nome de usuário do banco de dados
    $password = "";    // sua senha do banco de dados
    $dbname = "cadastro"; // nome do banco de dados

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        $mensagem = "Conexão falhou: " . $conn->connect_error;
    }

    // Coletar dados do formulário
    $nome = $conn->real_escape_string($_POST['nome']);
    $data_nasc = $conn->real_escape_string($_POST['data_nasc']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $conn->real_escape_string($_POST['senha']);
    $cpf = $conn->real_escape_string($_POST['cpf']); 
    $sexo = $conn->real_escape_string($_POST['sexo']);
    $estado = $conn->real_escape_string($_POST['estado']);
    $cep = $conn->real_escape_string($_POST['cep']); 
    $endereco = $conn->real_escape_string($_POST['endereco']); 
    $telefone = $conn->real_escape_string($_POST['telefone']); 


    // Criar o comando SQL para inserir os dados
    $sql = "INSERT INTO usuarios (nome, data_nasc, email, senha, cpf, sexo, estado, cep, endereco, telefone) VALUES ('$nome', '$data_nasc', '$email', '$senha', '$cpf', '$sexo', '$estado', '$cep', '$endereco', '$telefone')";

    // Executar o comando SQL
    if ($conn->query($sql) === TRUE) {
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao realizar cadastro: " . $conn->error;
    }
    // Fechar conexão
    $conn->close();

    // Redireciona para a página do formulário
    header("Location: cadastro.php");
    exit;
}
?>
