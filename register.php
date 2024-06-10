<?php
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "imobiliaria";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = "novo_usuario";
$pass = password_hash("senha_segura", PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (username, password) VALUES ('$user', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "Novo usuário inserido com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
