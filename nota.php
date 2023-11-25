<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acompanhamento Acadêmico</title>
    <link rel="stylesheet" href="css/academico.css">

    <link rel="website icon" type="png"
    href="logo.png">

</head>
<body>
    <div class="inicio">
        <h2>Acompanhamento Acadêmico </h2>
    </div>

    <title>Sistema de Notas dos Alunos</title>
    <style>
        /* Estilos CSS para formatar a tabela */
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Sistema de Notas dos Alunos</h1>

    <form id="notasForm">
        <label for="aluno">Selecione o Aluno:</label>
        <select id="aluno">
            <option value="Ana Silva">Ana Silva</option>
            <option value="Enzo Lima">Enzo Lima</option>
            <option value="Helena Costa">Helena Costa</option>
            <option value="Isabella Rodrigues">Isabella Rodrigues</option>
        </select>

        <label for="avaliacao">Nota de Avaliação:</label>
        <input type="number" id="avaliacao" min="0" max="10" required>

        <label for="participacao">Nota de Participação:</label>
        <input type="number" id="participacao" min="0" max="10" required>

        <label for="trabalho">Nota do Trabalho:</label>
        <input type="number" id="trabalho" min="0" max="10" required>

        <button type="button" onclick="calcularMedia()">Calcular Média</button>
    </form>

    <div id="tabelaNotas">
        <h2>Tabela de Notas</h2>
        <table>
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Avaliação</th>
                    <th>Participação</th>
                    <th>Trabalho</th>
                    <th>Média</th>
                </tr>
            </thead>
            <tbody>
                <!-- Os dados da tabela serão adicionados aqui dinamicamente -->
            </tbody>
        </table>
    </div>

    <script>
        // Função para calcular a média aritmética com valor inteiro
        function calcularMedia() {
            const alunoSelect = document.getElementById("aluno");
            const notaAvaliacao = parseInt(document.getElementById("avaliacao").value);
            const notaParticipacao = parseInt(document.getElementById("participacao").value);
            const notaTrabalho = parseInt(document.getElementById("trabalho").value);

            if (!isNaN(notaAvaliacao) && !isNaN(notaParticipacao) && !isNaN(notaTrabalho)) {
                const media = Math.round((notaAvaliacao + notaParticipacao + notaTrabalho) / 3);

                // Adicionar os dados à tabela
                const tabelaNotas = document.querySelector("#tabelaNotas table tbody");
                const alunoNome = alunoSelect.value;
                tabelaNotas.innerHTML += `
                    <tr>
                        <td>${alunoNome}</td>
                        <td>${notaAvaliacao}</td>
                        <td>${notaParticipacao}</td>
                        <td>${notaTrabalho}</td>
                        <td>${media}</td>
                    </tr>
                `;
            } else {
                alert("Certifique-se de inserir notas válidas.");
            }
        }
    </script>

<h1>Calculadora de Média</h1>
<form id="calculator">
    <label for="input1">Avaliação:</label>
    <input type="number" id="input1" name="nota1" step="0.01" required><br>
    
    <label for="input2">Trabalho:</label>
    <input type="number" id="input2" name="nota2" step="0.01" required><br>
    
    <label for="input3">Participação:</label>
    <input type="number" id="input3" name="nota3" step="0.01" required><br>
    
    <input type="submit" value="Calcular Média">
</form>

<div id="resultado"></div>

<script>
    const form = document.getElementById('calculator');
    const resultadoDiv = document.getElementById('resultado');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const nota1 = parseFloat(form.nota1.value);
        const nota2 = parseFloat(form.nota2.value);
        const nota3 = parseFloat(form.nota3.value);
        
        const media = (nota1 + nota2 + nota3) / 3;
        
        resultadoDiv.innerHTML = `A média é: ${media.toFixed(2)}`;
    });
</script>

</body>
</html>
