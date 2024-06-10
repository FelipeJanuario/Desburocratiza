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

$user = $_POST['username'];
$pass = $_POST['password'];

// Verificar usuário e senha
$sql = "SELECT * FROM usuarios WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        echo "Login bem-sucedido!";
        // Redirecionar para a página de administração
        header("Location: admin.php");
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}

$conn->close();
?>
