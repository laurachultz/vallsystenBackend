<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Acompanhamento Acadêmico</title>
    
    <link rel="stylesheet" href="css/academico.css">

    <link rel="favicon" type="png" href="img/logo.png">

</head>
<body>
    <div class="inicio">
        <b> Acompanhamento Acadêmico </b>
    </div>

    <br>

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

        <br>
        <br>

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

<html>
<head>
    <title>Sistema de Chamada de Alunos</title>
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
    <h1>Sistema de Chamada de Alunos</h1>

    <form id="chamadaForm">
        <label for="aluno">Nome do Aluno:</label>
        <select id="aluno">
            <option value="Ana Silva">Ana Silva</option>
            <option value="Enzo Lima">Enzo Lima</option>
            <option value="Helena Costa">Helena Costa</option>
            <option value="Isabella Rodrigues">Isabella Rodrigues</option>
        </select>

        <br>
        <br>

        <button type="button" onclick="registrarPresenca()">Registrar Presença</button>
    </form>

    <div id="frequencia">
        <h2>Frequência</h2>
        <p>Porcentagem de presença para hoje: <span id="porcentagem">0%</span></p>
    </div>

    <div id="tabelaPresenca">
        <h2>Tabela de Presença</h2>
        <table>
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Presença</th>
                </tr>
            </thead>
            <tbody>
                <!-- Os dados da tabela serão adicionados aqui dinamicamente -->
            </tbody>
        </table>
    </div>

    <script>
        // Variáveis para controlar a contagem de presença e armazenar informações dos alunos
        let totalAulas = 0;
        let aulasPresentes = 0;
        const alunos = {};

        // Função para registrar a presença do aluno
        function registrarPresenca() {
            const alunoSelect = document.getElementById("aluno");
            const alunoNome = alunoSelect.value;

            if (alunoNome !== "") {
                totalAulas++;
                aulasPresentes++;

                // Armazenar informações do aluno
                if (!alunos[alunoNome]) {
                    alunos[alunoNome] = 0;
                }
                alunos[alunoNome]++;

                // Adicionar os dados à tabela de presença
                const tabelaPresenca = document.querySelector("#tabelaPresenca table tbody");
                tabelaPresenca.innerHTML = "";
                for (const aluno in alunos) {
                    tabelaPresenca.innerHTML += `
                        <tr>
                            <td>${aluno}</td>
                            <td>${alunos[aluno]}</td>
                        </tr>
                    `;
                }

                atualizarFrequencia();
            }
        }

        // Função para atualizar a porcentagem de frequência
        function atualizarFrequencia() {
            const porcentagemFrequencia = (aulasPresentes / totalAulas) * 100;
            document.getElementById("porcentagem").textContent = porcentagemFrequencia.toFixed(2) + "%";
        }

        // Obtém o dia da semana atual (0 = Domingo, 1 = Segunda, ..., 6 = Sábado)
        const diaSemana = new Date().getDay();

        // Exibe o dia da semana atual no formulário
        const diasDaSemana = ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"];
        document.getElementById("frequencia").innerHTML += `<p>Dia da semana atual: ${diasDaSemana[diaSemana]}</p>`;
    </script>
</body>
</html>
