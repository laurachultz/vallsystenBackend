<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planejamento Pedagógico</title>

    <link rel="website icon" type="png" href="logo.png">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color:white;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #b5c7d5;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-family: Arial, Helvetica, sans-serif;
            color: #113859
        }

        h1 {
            margin: 0;
            padding: 20px;
            font-size: 25px;
            font-family: Arial, Helvetica, sans-serif;
            color: #113859
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .mes {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        ul {
            list-style-type: square;
            padding-left: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        .editar {
            display: none;
        }

        .editar-btn {
            background-color: #113859;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .editar-btn:hover {
            background-color: #265b87;
        }

        .editar-form {
            display: none;
            margin-top: 20px;
        }

        .editar-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            
        }

        .salvar-btn {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .salvar-btn:hover {
            background-color: #1e7e34;
        }

        .drive{
            margin-left: 20px;
        }

    </style>
</head>
<body>
    <header>
        <h1>Planejamento Pedagógico</h1>
    </header>

    <div class="container">
        <div class="nota">
            <div class="mes">Outubro</div>
            <ul>
                <li>Semana 1</li>
                <li>Semana 2</li>
                <li>Semana 3</li>
                <li>Semana 4</li>
            </ul>
            <button class="editar-btn">Editar</button>
            <form class="editar-form">
                <input class="editar-input" type="text" placeholder="Editar semana 1">
                <input class="editar-input" type="text" placeholder="Editar semana 2">
                <input class="editar-input" type="text" placeholder="Editar semana 3">
                <input class="editar-input" type="text" placeholder="Editar semana 4">
                <button class="salvar-btn">Salvar</button>
            </form>
        </div>

        <!-- Adicione mais blocos de notas para os outros meses -->
    </div>

    <script>
        const editarBtns = document.querySelectorAll('.editar-btn');
        const editarForms = document.querySelectorAll('.editar-form');

        editarBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                editarForms[index].style.display = 'block';
                btn.style.display = 'none';
            });
        });
    </script>

    <div class="drive">

    <p>Acesse o seu Google Drive, o armazenamento em nuvem que permite armazenar, compartilhar e sincronizar arquivos online, facilitando o acesso a documentos, fotos e vídeos:</p>

    <a href="https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Fdrive.google.com%2F&emr=1&followup=https%3A%2F%2Fdrive.google.com%2F&ifkv=AYZoVhehWIc3JU7VJIWzA4r9YQOBUXhkVZLWhnNcwzZVFfJO1U0-hhCUyMVH2nzjiUq7H8aA_UeH5Q&osid=1&passive=1209600&service=wise&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S-1643151968%3A1696959410595588&theme=glif" class="drive-link">
        <button class="drive-button">
            <img src="drive.png" alt="Google Drive" width="50" height="50">
        </button>
    </a>
    </div>
    
</body>
</html>
