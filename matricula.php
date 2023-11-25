<?php
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];
    $inst = $_POST['inst'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $senha = $_POST['senha'];

    $data = array(
        'nome' => $nome,
        'cpf' => $cpf,
        'cep' => $cep,
        'inst' => $inst,
        'email' => $email,
        'numero' => $numero,
        'senha' => $senha
    );

    $options = array(
        'http' => array(
            'header'  => "Content-Type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data)
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents('http://127.0.0.1:5000/professor', false, $context);

    if ($result === FALSE) {
        /* Handle error */
    }

    $response = json_decode($result, true);

    if ($response['status'] === 'success') {
        header('Location: login.php');
        exit;
    } else {
        echo '<p id="error-message">Usuário ou senha incorretos!</p>';
    }
?>