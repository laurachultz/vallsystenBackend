<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type");
    session_start();
?>
<?php
 $host = 'localhost';
                    $db   = 'id21573681_t_vall';
                    $user = 'id21573681_root123';
                    $pass = 'id21573681_Root123!';
                    $charset = 'utf8mb4';

                    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                    $opt = [
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES   => false,
                    ];
                    $pdo = new PDO('mysql:host=localhost;dbname=id21573681_t_vall', $user, $pass);
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    $errors = [];

    if(empty($login)){
        $errors[] = 'Login é obrigatório.';
    }

    if(empty($senha)){
        $errors[] = 'Senha é obrigatório.';
    }

    if(empty($errors)){
        
        $stmt = $pdo->prepare('SELECT * FROM Professor WHERE email = ? AND senha = ?');
        $stmt->execute([$login, $senha]);
        $user = $stmt->fetch();
        
        if($user != null){
        header("Location: site.php");
        }
}
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="login">Email:</label>
                <input type="text" id="login" name="login" placeholder="Digite seu email">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
            </div>
            <div class="btn-container">
                <button type="submit" onclick="logar(); return false">Entrar</button>
            </div>
            <div class="error-message" id="error-message"></div>
        </form>
        <p class="note">Ainda não possui uma conta? <a href="MatriculaProfessor.php">Cadastre-se</a></p>
        <div class="footer">&copy; 2023 Sua Empresa. Todos os direitos reservados.</div>
    </div>

    
</body>

</html>