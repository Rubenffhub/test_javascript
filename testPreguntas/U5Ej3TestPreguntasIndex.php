<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Menu test</title>
</head>
    <!-- 
        localhost/DWEC/2EV/PracticasU5evaluables/testPreguntas/U5Ej3TestPreguntasIndex.php

        RUBEN FERNANDEZ FERNANDEZ
        DesWebEntornoCliente - DWEC

        Crear un test sobre preguntas de javascript extraídas por chat gpt...
        Debemos tener varias preguntas (mínimo 15) con 4 respuestas de ellas una es la correcta.
        Las preguntas y las respuestas se mostrarán de forma aleatoria y siempre mostrarán 10 preguntas.
        Las preguntas y respuestas son obtenidas de BBDD.
        - Tienen que existir tres botones: Añadir nueva pregunta y respuesta.
        Realizar el test. Almacenar las nuevas preguntas y respuestas añadidas en la BBDD
        - Mostrar el cuestionario en el que por cada pregunta exista un botón que muestre 
            la respuesta una vez seleccionada la respuesta mostrar si es correcta o no 
            y si es incorrecta indicar la respuesta correcta mediante css.
        Las preguntas y las respuestas en este ejercicio tienen que ser extraídas de BBDD mediante php

    
    -->
<body>
    <style>
        .contenido{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        input[type=submit]{
            padding: 10%;
            text-align: center;
        }
    </style>
    <!-- Realiza la accion dependiendo del boton que se pulse -->
    <div class="contenido">
    <form method="post" action="
    <?php 
    if(isset($_POST['crearPregunta'])){
        header("Location: U5Ej3TestPreguntasAgregar.php");
    }
    if(isset($_POST['generarTest'])){
        header("Location: U5Ej3TestPreguntasGenerar.php");
    }
    ?>">
    <h3>¿Qué deseas realizar?</h3>
        <p><input id="crearPregunta" name="crearPregunta" type="submit" value="Crear nueva pregunta"></p>
        <p><input id="generarTest" name="generarTest" type="submit" value="Generar test"></p>
    </form>
    </div>
    <script>
        document.getElementById("crearPregunta").style.width = "100%";
        document.getElementById("generarTest").style.width = "100%";
    </script>
    
</body>
</html>