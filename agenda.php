<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Virtual</title>

    <link rel="favicon" type="png" href="../img/logo.png">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
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

        .schedule {
            display: grid;
            grid-template-columns: 1fr repeat(5, 2fr);
            grid-gap: 10px;
            margin-top: 20px;
            margin-left: 20px;
            margin-right: 30px;
        }

        .time {
            font-weight: bold;
        }

        .subject {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .matematica {
            background-color: rgb(147, 207, 227);
        }

        .portugues {
            background-color: lightgreen;
        }

        .ciencias {
            background-color: rgb(255, 255, 86);
        }

        .historia{
            background-color: rgb(248, 167, 179);
        }

        .ingles{
            background-color: lightsalmon;
        }

        .educacao-fisica {
           background-color: rgb(202, 192, 192);
        }

        .intervalo{
            background-color: #fff;
        }

        .agenda{
            margin-left: 20px;
        }

    </style>
</head>
<body>

    <header>
        <h1>Cronograma de Aulas</h1>
    </header>

<br>

    <div class="schedule">
        <div></div>
        <div class="time">07:30 - 08:30</div>
        <div class="time">08:30 - 09:30</div>
        <div class="time">09:30 - 10:00</div>
        <div class="time">10:00 - 11:00</div>
        <div class="time">11:00 - 12:00</div>
        
        <div class="time">Segunda</div>
        <div class="subject matematica">Matemática</div>
        <div class="subject portugues">Português</div>
        <div class="subject intervalo">Intervalo</div>
        <div class="subject ciencias">Ciências</div>
        <div class="subject historia">História e Geografia</div>
        
        <div class="time">Terça</div>
        <div class="subject portugues">Português</div>
        <div class="subject matematica">Matemática</div>
        <div class="subject intervalo">Intervalo</div>
        <div class="subject ingles">Inglês</div>
        <div class="subject educacao-fisica">Educação Física</div>
        
        <div class="time">Quarta</div>
        <div class="subject ciencias">Ciências</div>
        <div class="subject matematica">Matemática</div>
        <div class="subject intervalo">Intervalo</div>
        <div class="subject portugues">Português</div>
        <div class="subject historia">História e Geografia</div>
        
        <div class="time">Quinta</div>
        <div class="subject historia">História e Geografia</div>
        <div class="subject ingles">Inglês</div>
        <div class="subject intervalo">Intervalo</div>
        <div class="subject matematica">Matemática</div>
        <div class="subject ciencias">Ciências</div>
        
        <div class="time">Sexta</div>
        <div class="subject educacao-fisica">Educação Física</div>
        <div class="subject portugues">Português</div>
        <div class="subject intervalo">Intervalo</div>
        <div class="subject ingles">Inglês</div>
        <div class="subject matematica">Matemática</div>
    </div>

    <br>

<div class="agenda">
    
       Acesse o seu Google Agenda, personalize o seu calendário virtual e consulte os eventos registrados: 
       
    <br>
    <br>
    
    <a href="https://calendar.google.com/calendar/u/0/r">
        <button class="planejamento">
            <i class="fa-brands fa-google-drive"></i>
        </button>
    </a>
</div>


</body>
</html>
