<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_GET['id'];

        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $CPF = $_POST['CPF'];
        $CEP = $_POST['CEP'];

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


        // Atualizar as informações do professor no banco de dados
        $sql = "UPDATE Professor SET nome = ?, telefone = ?, email = ?, cpf = ?, cep = ? WHERE id_professor = ?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$nome, $telefone, $email, $CPF, $CEP, $id]);

        header('Location: users.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div class="container">

    <?php
    $id = $_GET['id'];

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


    // Buscar as informações do professor no banco de dados
    $sql = "SELECT * FROM Professor WHERE id_professor = ?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$id]);
    $professor = $stmt->fetch();

    echo '
        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="' . $professor['nome'] . '">
            </div>
            <div>
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" id="nome" class="form-control" name="telefone" value="' . $professor['Telefone'] . '">
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="' . $professor['email'] . '">
            </div>
            <div>
                <label for="CPF" class="form-label">CPF</label>
                <input type="text" name="CPF" class="form-control" value="' . $professor['CPF'] . '">
            </div>
            <div>
                <label for="CEP" class="form-label">CEP</label>
                <input type="text" name="CEP" class="form-control" value="' . $professor['CEP'] . '">
            </div>
            <input class="form-control btn btn-primary" type="submit" value="Enviar">
        </form>
    ';
?>
</body>
</html>
</div>