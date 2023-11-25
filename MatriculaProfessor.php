<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
session_start();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
    $inst = isset($_POST['inst']) ? $_POST['inst'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    $errors = [];

    if (empty($nome)) {
        $errors[] = 'Nome é obrigatório.';
    }

    if (empty($cpf)) {
        $errors[] = 'CPF é obrigatório.';
    } else if (!preg_match('/^[0-9]{11}$/', $cpf)) {
        $errors[] = 'CPF inválido.';
    }

    if(empty($cep)) {
        $errors[] = 'CEP é obrigatório.';
    } else if (!preg_match('/^[0-9]{8}$/', $cep)) {
        $errors[] = 'CEP inválido.';
    }

    if (empty($inst)) {
        $errors[] = 'Instituição de ensino é obrigatório.';
    }

    if (empty($email)) {
        $errors[] = 'Email é obrigatório.';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email inválido.';
    }

    if (empty($numero)) {
        $errors[] = 'Telefone é obrigatório.';
    } else if (!preg_match('/^[0-9]{11}$/', $numero)) {
        $errors[] = 'Telefone inválido.';
    }

    if (empty($senha)) {
        $errors[] = 'Senha é obrigatório.';
    } else if (strlen($senha) < 6) {
        $errors[] = 'Senha deve ter no mínimo 6 caracteres.';
    }
    


    if (empty($errors)) {
        $data = array(
            'nome' => $nome,
            'cpf' => $cpf,
            'cep' => $cep,
            'inst' => $inst,
            'email' => $email,
            'numero' => $numero,
            'senha' => $senha
        );

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

        // Inserir os dados do professor no banco de dados
        $sql = "INSERT INTO Professor (nome, cpf, cep, instituicao, email, telefone, senha) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$nome, $cpf, $cep, $inst, $email, $numero, $senha]);

        header('Location: login.php');
        exit;
    }
     else{
        $_SESSION['errors'] = $errors;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experimente Grátis</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #113859, #5997ca); /* Updated Gradient + Image */
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.9);
        }

        .container h2 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
            color: #000000; /* Text color changed to white for better contrast */
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #f5f5f5;
            border: none;
            border-radius: 6px;
            transition: background-color 0.3s ease-in-out;
            outline: none;
        }

        .form-group input:focus {
            background-color: #e0e0e0;
        }

        .btn-container {
            text-align: center;
        }

        .btn-container input[type="button"] {
            padding: 15px 32px;
            font-size: 18px;
            background-color: #113859; /* Updated color */
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            font-weight: bold;
        }

        .btn-container input[type="button"]:hover {
            background-color: #092542; /* Darker shade on hover */
        }

        .btn-container input[type="submit"] {
            padding: 15px 32px;
            font-size: 18px;
            background-color: #113859; /* Updated color */
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            font-weight: bold;
        }
        
        .note {
            font-size: 14px;
            text-align: center;
            margin-top: 15px;
            color: #333;
        }

        .note a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }
        
        .form-group select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #f5f5f5;
            border: none;
            border-radius: 6px;
            transition: background-color 0.3s ease-in-out;
            outline: none;
        }

    </style>
    
</head>

<body>
    
    <div class="container">
        <h2>CADASTRO</h2>
        <form id="cadastroForm"  method="POST" >
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="Digite seu cpf">
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" placeholder="Digite seu cep">
            </div>
            <div class="form-group">
                <label for="inst">Instituição de Ensino:</label>
                <?php
                    // Conexão com o banco de dados
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

                    // Buscar as instituições no banco de dados
                    $sql = "SELECT * FROM Instituicao";
                    $stmt= $pdo->query($sql);
                    $instituicoes = $stmt->fetchAll();

                    if ($instituicoes === null) {
                        echo "Erro na leitura do banco de dados.";
                    } else {
                        echo '<select id="inst" name="inst">';
                        foreach ($instituicoes as $instituicao) {
                            echo '<option value="' . $instituicao['id_instituicao'] . '">' . $instituicao['nome'] . '</option>';
                        }
                        echo '</select>';
                    }
            ?>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Digite seu email">
            </div>
            <div class="form-group">
                <label for="numero">Telefone:</label>
                <input type="text" id="numero" name="numero" placeholder="Digite seu telefone">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
            </div>
            <div class="btn-container">
                <input type="submit" value="CADASTRAR">
            </div>
            <p class="note">Já possui uma conta? <a href="login.php">Faça login</a></p>
        </form>
        <?php if (isset($_SESSION['errors'])): ?>
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['errors']); ?>
        <?php endif; ?>
    </div>
</body>
<script src="css/bootstrap/js/bootstrap.js"></script>
</html>
