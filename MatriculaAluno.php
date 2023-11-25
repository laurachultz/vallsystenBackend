<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experimente Grátis</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #113859, #5997ca), url('school-background.jpg'); /* Updated Gradient + Image */
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

    </style>
</head>

<body>
    <div class="container">
        <h2>CADASTRO</h2>
        <form>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" placeholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="cpf" id="cpf" placeholder="Digite seu cpf">
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="cep" id="cep" placeholder="Digite seu cep">
            </div>
            <div class="form-group">
                <label for="inst">Instituição de Ensino:</label>
                <input type="text" id="inst" placeholder="Digite a instituição de ensino">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" placeholder="Digite seu email">
            </div>
            <div class="form-group">
                <label for="numero">Telefone:</label>
                <input type="text" id="numero" placeholder="Digite seu telefone">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" placeholder="Digite sua senha">
            </div>
            <div class="btn-container">
                <input type="button" value="CADASTRAR" onClick="alert('Cadastrado com sucesso! Aguarde a validação no e-mail para iniciar o período de teste grátis.'); return true">
            </div>
            <p class="note">Já possui uma conta? <a href="login.php">Faça login</a></p>
        </form>
    </div>

</body>

</html>