<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Frequência</title>

    <link rel="website icon" type="png"
    href="../img/logo.png">

</head>
<body>

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
