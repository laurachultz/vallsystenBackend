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

 

    // Buscar as informações dos professores no banco de dados
    $sql = "SELECT * FROM Professor";
    $stmt= $pdo->query($sql);
    $users = $stmt->fetchAll();

    // Agora a variável $users contém as informações dos professores
?>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    </head>
    <body>
        <div class="container">
            <h1>Professores</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Instituição</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id_professor']; ?></td>
                            <td><?php echo $user['nome']; ?></td>
                            <td><?php echo $user['Instituicao']; ?></td>
                            <td>
                                <a href="editprofessor.php?id=<?php echo $user['id_professor']; ?>" class="btn btn-primary">Editar</a>
                                <a href="deleteprofessor.php?id=<?php echo $user['id_professor']; ?>" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>